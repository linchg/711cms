<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class App
 * 应用管理
 */
class App extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('cms');
        $this->load->model('m_App');
        $this->load->model('m_AppCategory');
        $this->load->model('m_History');
        $this->load->model('m_Resource');
        $this->load->model('m_AppComment');
        $this->load->model('m_Recommend');
        $this->load->model('m_Special');
        $this->load->model('m_Advert');
        $this->load->model('m_Necessary');

    }

    /**
     * 我的应用-管理页面
     */
    public function main() {
        $page = intval($this->input->get('page'));
        if ($page < 1) {
            $page = 1;
        }
        $source_id = intval($this->input->get('source_id'));
        $parent_id = intval($this->input->get('parent_id'));
        $last_cate_id = intval($this->input->get('last_cate_id'));
        $search_type = $this->input->get('search_type', true);
        $search_txt = $this->input->get('search_txt', true);

        $where = array();

        if ($this->db->field_exists('source_id', 'app')) {
            if ($source_id > 0) {
                $where['source_id'] = $source_id;
            }
            $this->_data['source_id'] = $source_id;
        }

        $this->_data['parent_id'] = $parent_id;

        if ($last_cate_id > 0) {
            $where['last_cate_id'] = $last_cate_id;
        }
        $this->_data['last_cate_id'] = $last_cate_id;

        $order_by = "app_type desc,app_id desc";
        if (!empty($search_type)) {
            $order_by = $search_type . " desc";
        }
        $this->_data['search_type'] = $search_type;

        if (!empty($search_txt)) {
            if ($search_type == 'app_id' && is_numeric($search_txt) && $search_txt > 0) {
                $where['app_id'] = $search_txt;
            } else {
                $where["app_title like"] = '%' . trim($search_txt) . '%';
            }
        }
        $this->_data['search_txt'] = $search_txt;


        $app_id = intval($this->input->post('app_id'));
        if ($app_id > 0) {
            $where['app_id'] = $app_id;
        }
        $this->_data['app_id'] = $app_id;

        $cate_id = intval($this->input->get('cate_id'));
        if ($cate_id > 0) {
            $where['cate_id'] = $cate_id;
        }
        $this->_data['cate_id'] = $cate_id;

        $categorywhere = array();
        if ($parent_id > 0) {
            $categorywhere['parent_id'] = $parent_id;
        }
        $category = $this->m_AppCategory->getCategoryAll($categorywhere);
        $cates = array();
        $parents = array();
        if (is_array($category) && sizeof($category) > 0) {
            foreach ($category as $value) {
                $cates[$value['cate_id']] = $value['cname'];
                $parents[$value['parent_id']][$value['cate_id']] = $value['cname'];
            }
        }
        $this->_data['cates'] = $cates;
        $this->_data['parents'] = $parents;
        $this->_data['category'] = $category;

        $appTypeName = array(
            1 => '普通应用',
            2 => 'CPA',
            3 => 'CPS'
        );
        $this->_data['appTypeName'] = $appTypeName;

        $appParents = array(
            1 => '软件',
            2 => '游戏'
        );
        $this->_data['appParents'] = $appParents;

        $config = $this->config->item('pagination');
        if (isset($this->_site['pagesize']) && $this->_site['pagesize'] >= 10 && $this->_site['pagesize'] <= 100) {
            $config['per_page'] = $this->_site['pagesize'];
        }
        $limit = $config['per_page'];
        $offset = ($page - 1) * $limit;

        if ($parent_id > 0) {
            $where['parent_id'] = $parent_id;
            $list = $this->m_App->joinCategory($where, $limit, $offset, $order_by);
            $list2 = $this->m_App->joinCategory($where, 0, 0);
            $count = count($list2);
        } else {
            $list = $this->m_App->getAppList($where, $limit, $offset, $order_by);
            $count = $this->m_App->getAppCount($where);
        }

        //分页参数
        $getdata = array(
            'parent_id' => $parent_id,
            'last_cate_id' => $last_cate_id
        );
        if ($this->db->field_exists('source_id', 'app')) {
            $getdata['source_id'] = $source_id;
        }
        if (!empty($search_txt)) {
            $getdata['search_type'] = $search_type;
            $getdata['search_txt'] = '';
        }
        if ($search_type) {
            $getdata['search_type'] = $search_type;
        }
        $config['base_url'] = build_url('App', 'main', $getdata);
        $config['total_rows'] = $count;
        $this->pagination->initialize($config);

        $this->_data['count'] = $count;
        $this->_data['limit'] = $limit;
        $this->_data['offset'] = $offset;
        $this->_data['list'] = $list;

        $this->loadView('/App/index');
    }

    /**
     * 根据应用类型获取应用分类-ajax
     */
    public function app_category() {
        $type = intval($this->input->post('type'));
        $where = array();
        if ($type > 0) {
            $where['parent_id'] = $type;
        }
        $category = $this->m_AppCategory->getCategoryAll($where);
        $this->output->ok_json($category);
    }

    /**
     * 根据类型返回推荐，专题，必备等数据
     */
    public function manager_type() {
        $type = intval($this->input->post('type'));
        if ($type >= 1 && $type < 4) {
            $where = array(
                'area_type' => $type
            );
            $list = $this->m_Recommend->getRecommendList($where, 0, 0);

            $this->output->ok_json($list);
        }
        if ($type == 4) {
            $where = array();
            $list = $this->m_Special->getSpecialList($where, 0, 0);

            $this->output->ok_json($list);
        }
        if ($type == 5) {
            $where = array();
            $list = $this->m_Necessary->getNecessaryList($where, 0, 0);
            $this->output->ok_json($list);
        }
    }

    /**
     * 应用添加到推荐
     */
    public function add_recommend() {
        $array_type = array(
            '1' => 'pc推荐',
            '2' => '手助推荐',
            '3' => 'WAP推荐',
            '4' => '应用专题',
            '5' => '装机必备'
        );
        $type = intval($this->input->post('type'));
        $app_ids = $this->input->post('app_id', true);
        $area_id = intval($this->input->post('area_id'));
        if (!$type) {
            $this->output->error_json(100, '请选择推荐类型！');
        }
        if (empty($app_ids)) {
            $this->output->error_json(100, '请选择推荐的应用！');
        }
        if (!$area_id) {
            $this->output->error_json(100, '请选择推荐位！');
        }
        $app_arr = explode(',', $app_ids);

        if ($type >= 1 && $type <= 3 && $area_id) {
            $list = $this->m_Recommend->getRecommendInfoById($area_id);
            $arr_list = explode(',', $list['area_ids']);
            if ($list) {
                foreach ($app_arr as $k => $v) {
                    if (in_array($v, $arr_list)) {
                        unset($app_arr[$k]);
                    }
                }
                $app_ids = implode(',', $app_arr);
                if (empty($app_ids)) $this->output->ok_json('推荐的应用已经存在！');
                if (empty($list['area_ids'])) $data = array('area_ids' => $app_ids);
                if (!empty($list['area_ids']) && $app_ids) $data = array('area_ids' => $app_ids . ',' . $list['area_ids']);
                $this->m_Recommend->updateRecommendById($data, $area_id);
            }
            $this->operate_log('App', 'add_recommend', '添加到推荐成功：' . $array_type[$type] . '的' . $list['area_title']);
            $this->output->ok_json('推荐成功！');
        }
        if ($type == 4) {
            $list = $this->m_Special->getSpecialInfoById($area_id);
            $arr_list = explode(',', $list['area_ids']);
            if ($list) {
                foreach ($app_arr as $k => $v) {
                    if (in_array($v, $arr_list)) {
                        unset($app_arr[$k]);
                    }
                }
                $app_ids = implode(',', $app_arr);
                if (empty($app_ids)) $this->output->ok_json('推荐的应用已经存在！');
                if (empty($list['area_ids'])) $data = array('area_ids' => $app_ids);
                if (!empty($list['area_ids']) && $app_ids) $data = array('area_ids' => $app_ids . ',' . $list['area_ids']);
                $this->m_Special->updateSpecialById($data, $area_id);
            }
            $this->operate_log('App', 'add_recommend', '添加到推荐成功：' . $array_type[$type] . '的' . $list['area_title']);
            $this->output->ok_json('推荐成功！');
        }
        if ($type == 5) {
            $list = $this->m_Necessary->getNecessaryInfoById($area_id);
            $arr_list = explode(',', $list['necessary_list']);
            if ($list) {
                foreach ($app_arr as $k => $v) {
                    if (in_array($v, $arr_list)) {
                        unset($app_arr[$k]);
                    }
                }
                $app_ids = implode(',', $app_arr);
                if (empty($app_ids)) $this->output->ok_json('推荐的应用已经存在！');
                if (empty($list['necessary_list'])) $data = array('necessary_list' => $app_ids);
                if (!empty($list['necessary_list']) && $app_ids) $data = array('necessary_list' => $app_ids . ',' . $list['necessary_list']);
                $this->m_Necessary->updateNecessaryById($data, $area_id);
            }
            $this->operate_log('App', 'add_recommend', '添加到推荐成功：' . $array_type[$type] . '的' . $list['necessary_title']);
            $this->output->ok_json('推荐成功！');
        }
    }

    /**
     * 应用后台管理页面
     */
    public function content() {
        $app_id = intval($this->input->get('app_id'));

        $info = array();
        $history = array();
        $resource = array();

        if ($app_id > 0) {
            $info = $this->m_App->getAppInfoById($app_id);
            $history = $this->m_History->getHistoryAppAll($app_id);
            $resource = $this->m_Resource->getResourceAppAll($app_id);
        }
        $this->_data['info'] = $info;
        $this->_data['history'] = $history;
        $this->_data['resource'] = $resource;

        $category = $this->m_AppCategory->getCategoryAll();
        $cates = array();
        $parents = array();
        if (is_array($category) && sizeof($category) > 0) {
            foreach ($category as $value) {
                $cates[$value['cate_id']] = $value['cname'];
                $parents[$value['parent_id']][$value['cate_id']] = $value['cname'];
            }
            $parents[1] = isset($parents[1]) ? $parents[1] : array();
            $parents[2] = isset($parents[2]) ? $parents[2] : array();
        }
        $this->_data['cates'] = $cates;
        $this->_data['parents'] = $parents;
        $this->_data['category'] = $category;

        $this->_data['time'] = time();
        $private = $this->input->server('HTTP_HOST') . $this->_site['auth_code'];
        $this->_data['private'] = md5($private);
        $this->_data['token'] = $this->getUploadToken($this->_data['time']);
        $this->_data['author'] = true;

        $this->loadView('/App/content');
    }

    /**
     * 添加服务器应用
     */
    public function file() {
        $token = $this->input->get('token', true);
        $time = $this->input->get('time', true);

        $folder = $this->input->get('folder',true);
        $folder = $folder ? $folder : '/';
        $type = $this->input->get('type', true);
        $folder = urldecode($folder);
        $arr_token = array(
            'folder' => $folder,
            'type' => $type,
            'time' => $time
        );
        $private = md5($this->input->server('HTTP_HOST') . $this->_site['auth_code']);
        $token2 = appToken($arr_token, $private);
        if ($token2 != $token) {
            $folder = '/';
        }
        if (strpos($folder, '..') !== false || strpos($folder, ':') !== false) {
            $folder = '/';
        }

        $type = $type ? $type : 'apk|jpg|gif|png';
        $this->_data['type'] = $type;

        $arr_type = explode('|', $type);
        $arr_type_num = count($arr_type);
        if ($folder) {
            $dir = root_path($folder);
            $arr_data = array();
            $arr_data['folders'] = array();
            $arr_data['apks'] = array();
            $arr_data['images'] = array();
            $scan_result = scandir($dir);
            foreach ($scan_result as $key => $value) {
                if ($value == '.' || $value == '..') {
                    continue;
                }
                if (is_dir($dir . $value)) {
                    $arr_data['folders'][] = array(
                        'folder' => $value,
                        'size' => filesize($dir . $value) ? filesize($dir . $value) : 0,
                        'date' => filemtime($dir . $value) ? filemtime($dir . $value) : time() - 3600 * 12
                    );
                } else {
                    $type = explode('.', $value);
                    $type = array_reverse($type);
                    if (in_array($type[0], $arr_type) && $arr_type_num == 1) {
                        $arr_data['apks'][] = array(
                            'apk' => $value,
                            'size' => filesize($dir . $value) ? filesize($dir . $value) : 0,
                            'date' => filemtime($dir . $value) ? filemtime($dir . $value) : time() - 3600 * 12
                        );
                    }
                    if (in_array($type[0], $arr_type) && $arr_type_num > 1) {
                        $arr_data['images'][] = array(
                            'image' => $value,
                            'size' => filesize($dir . $value) ? filesize($dir . $value) : 0,
                            'date' => filemtime($dir . $value) ? filemtime($dir . $value) : time() - 3600 * 12
                        );
                    }
                }
            }
            $this->_data['file'] = $arr_data;
            $this->_data['folder'] = $folder;
            $this->_data['time'] = time();
            $this->_data['private'] = $private;

        }
        $this->loadView('/App/file');
    }

    /**
     * 应用保存
     */
    public function save() {
        $app_id = intval($this->input->get('app_id'));

        $last_cate_id = $this->input->post('last_cate_id');
        if ($last_cate_id < 1) {
            $this->output->error_json(210, "请选择应用分类");
        };
        $app_title = $this->input->post('app_title', true);
        if (empty($app_title)) {
            $this->output->error_json(220, "请输入应用标题");
        }
        $app_stitle = $this->input->post('app_stitle', true);
        $app_update_time = $this->input->post('app_update_time', true);
        $app_type = intval($this->input->post('app_type'));
        $app_logo = $this->input->post('app_logo', true);
        $app_desc = $this->input->post('app_desc');
        $app_company = $this->input->post('app_company', true);
        $app_company_url = $this->input->post('app_company_url', true);
        $app_tags = $this->input->post('app_tags', true);
        $app_grade = $this->input->post('app_grade', true);
        $app_recomment = $this->input->post('app_recomment', true);
        $app_comments = $this->input->post('app_comments', true);
        $app_visitors = $this->input->post('app_visitors', true);
        $app_down = $this->input->post('app_down', true);
        $app_order = $this->input->post('app_order', true);
        $data_app_id = intval($this->input->post('data_app_id'));
        $charge_app_id = intval($this->input->post('charge_app_id'));
        $app_seodesc = $this->input->post('app_seodesc', true);
        $app_seokey = $this->input->post('app_seokey', true);

        $apk_path = $this->input->post('apk_path', true);
        if (is_array($apk_path) && sizeof($apk_path) > 0) {
            $apk_package = $this->input->post('apk_package', true);
            if (!is_array($apk_package) || sizeof($apk_package) < 1) {
                $this->output->error_json(300, "请输入应用的包名");
            }
            $apk_size = $this->input->post('apk_size', true);
            if (!is_array($apk_size) || sizeof($apk_size) < 1) {
                $this->output->error_json(300, "请输入应用的文件大小");
            }
            $apk_system = $this->input->post('apk_system', true);
            if (!is_array($apk_system) || sizeof($apk_system) < 1) {
                $this->output->error_json(300, "请输入应用的系统要求");
            }
            $apk_version = $this->input->post('apk_version', true);
            if (!is_array($apk_version) || sizeof($apk_version) < 1) {
                $this->output->error_json(300, "请输入应用的版本号");
            }
            $apk_sdk = $this->input->post('apk_sdk', true);
            $apk_code = $this->input->post('apk_code', true);
            $apk_permission = $this->input->post('apk_permission', true);
            $_all = sizeof($apk_path);
            if (sizeof($apk_package) != $_all || sizeof($apk_version) != $_all || sizeof($apk_size) != $_all || sizeof($apk_system) != $_all) {
                $this->output->error_json(300, "您上传应用的apk信息不正确");
            }
        }

        $resource_image = $this->input->post('resource_image', true);
        if (is_array($resource_image) && sizeof($resource_image) > 0) {
            $resource_weight = $this->input->post('resource_weight', true);
            if (!is_array($resource_weight) || sizeof($resource_weight) < 1) {
                $this->output->error_json(400, "请输入应用的图片宽度");
            }
            $resource_height = $this->input->post('resource_height', true);
            if (!is_array($resource_height) || sizeof($resource_height) < 1) {
                $this->output->error_json(400, "请输入应用的图片高度");
            }
            $resource_size = $this->input->post('resource_size', true);
            if (!is_array($resource_size) || sizeof($resource_size) < 1) {
                $this->output->error_json(300, "请输入应用的图片文件大小");
            }
            $_count = sizeof($resource_image);
            if (sizeof($resource_weight) != $_count || sizeof($resource_height) != $_count || sizeof($resource_size) != $_count) {
                $this->output->error_json(300, "您上传应用的apk信息不正确");
            }
        }

        if ($app_id > 0) {
            $info = $this->m_App->getAppInfoById($app_id);
            if (!is_array($info) || sizeof($info) < 1) {
                $this->output->error_json(241, "没有此app");
            }

            $data = array();
            if ($last_cate_id) {
                $data['last_cate_id'] = $last_cate_id;
            }
            if ($app_title) {
                $data['app_title'] = $app_title;
            }
            if ($app_stitle) {
                $data['app_stitle'] = $app_stitle;
            }
            if ($app_update_time) {
                $data['app_update_time'] = strtotime($app_update_time);
            }
            if ($app_type) {
                $data['app_type'] = $app_type;
            }
            if ($app_logo) {
                $data['app_logo'] = $app_logo;
            }
            if ($app_desc) {
                $data['app_desc'] = $app_desc;
            }
            if ($app_company) {
                $data['app_company'] = $app_company;
            }
            if ($app_company_url) {
                $data['app_company_url'] = $app_company_url;
            }
            if ($app_tags) {
                $data['app_tags'] = $app_tags;
            }
            if ($app_grade) {
                $data['app_grade'] = $app_grade;
            }
            if ($app_recomment) {
                $data['app_recomment'] = $app_recomment;
            }
            $data['uid'] = $this->_uid;
            if ($app_comments) {
                $data['app_comments'] = $app_comments;
            }
            if ($app_visitors) {
                $data['app_visitors'] = $app_visitors;
            }
            if ($app_down) {
                $data['app_down'] = $app_down;
            }
            if ($app_order) {
                $data['app_order'] = $app_order;
            }
            if ($app_seodesc) {
                $data['app_seodesc'] = $app_seodesc;
            }
            if ($app_seokey) {
                $data['app_seokey'] = $app_seokey;
            }

            if (!is_array($resource_image) || sizeof($resource_image) < 1) {
                $resource_count = $this->m_Resource->getResourceCount(array("info_app_id" => $app_id));
                if ($resource_count < 1) {
                    $this->output->error_json(250, "请至少上传一个应用的图片");
                }
            }
            if (!is_array($apk_path) || sizeof($apk_path) < 1) {
                $history_count = $this->m_History->getHistoryCount(array("app_id" => $app_id));
                if ($history_count < 1) {
                    $this->output->error_json(250, "请至少上传一个应用的版本");
                }
            }

            if (is_array($resource_image) && sizeof($resource_image) > 0) {
                foreach ($resource_image as $key => $image) {
                    $this->m_Resource->createResource(array(
                        "info_app_id" => $app_id,
                        "type" => 0,
                        "resource_url" => $image,
                        "width" => isset($resource_weight[$key]) ? $resource_weight[$key] : 0,
                        "height" => isset($resource_height[$key]) ? $resource_height[$key] : 0,
                        "size" => isset($resource_size[$key]) ? $resource_size[$key] : 0
                    ));
                }
            }
            if (is_array($apk_path) && sizeof($apk_path) > 0) {
                foreach ($apk_path as $key => $apk) {
                    if (isset($apk_size[$key])) {
                        if (strpos($apk_size[$key], 'K') > 0) {
                            $size_app = intval(floatval($apk_size[$key]) * 1024);
                        } elseif (strpos($apk_size[$key], 'M') > 0) {
                            $size_app = intval(floatval($apk_size[$key]) * 1024 * 1024);
                        } else {
                            $size_app = $apk_size[$key];
                        }
                    }
                    $this->m_History->createHistory(array(
                        "app_id" => $app_id,
                        "history_version" => isset($apk_version[$key]) ? $apk_version[$key] : '',
                        "history_update_time" => time(),
                        "history_size" => isset($apk_size[$key]) ? $size_app : '',
                        "history_system" => isset($apk_system[$key]) ? $apk_system[$key] : '',
                        "data_history_id" => 0,
                        "history_type" => 1,
                        "history_minSdkVersion" => isset($apk_sdk[$key]) ? $apk_sdk[$key] : '',
                        "history_package" => isset($apk_package[$key]) ? $apk_package[$key] : '',
                        "history_VersionCode" => isset($apk_code[$key]) ? $apk_sdk[$key] : 0,
                        "history_permission" => isset($apk_permission[$key]) ? $apk_permission[$key] : '',
                        "history_file" => $apk
                    ));
                }
            }

            $result = $this->m_App->updateAppById($data, $app_id);
            if ($result) {
                $this->operate_log('App', 'update', '修改了应用：' . $app_title);
                $this->output->ok_json("更新应用成功");
            }
            $this->operate_log('App', 'update', '修改应用失败' . $app_title);
            $this->output->error_json(240, "编辑应用失败");
        }

        $info = $this->m_App->getAppInfoByName($app_title);
        if (is_array($info) && sizeof($info) > 0) {
            $this->output->error_json(230, "已经存在此应用");
        }

        if (!is_array($apk_path) || sizeof($apk_path) < 1) {
            $this->output->error_json(250, "请至少上传一个应用的版本");
        }
        if (!is_array($resource_image) || sizeof($resource_image) < 1) {
            $this->output->error_json(250, "请至少上传一个应用的图片");
        }

        $insert_id = $this->m_App->createApp(array(
            "last_cate_id" => $last_cate_id,
            "app_title" => $app_title,
            "app_stitle" => $app_stitle,
            "app_update_time" => strtotime($app_update_time),
            "app_type" => $app_type,
            "app_logo" => $app_logo,
            "app_desc" => $app_desc,
            "app_company" => $app_company,
            "app_company_url" => $app_company_url,
            "app_tags" => $app_tags,
            "create_time" => time(),
            "app_grade" => $app_grade,
            "app_recomment" => $app_recomment,
            "uid" => $this->_uid,
            "app_comments" => $app_comments,
            "app_visitors" => $app_visitors,
            "app_down" => $app_down,
            "app_order" => $app_order,
            "data_app_id" => $data_app_id,
            "charge_app_id" => $charge_app_id,
            "app_seodesc" => $app_seodesc,
            "app_seokey" => $app_seokey,
        ));
        if (!$insert_id) {
            $this->output->error_json(240, "添加应用失败");
        }

        foreach ($resource_image as $key => $image) {
            $this->m_Resource->createResource(array(
                "info_app_id" => $insert_id,
                "type" => 0,
                "resource_url" => $image,
                "width" => !empty($resource_weight[$key]) ? $resource_weight[$key] : 0,
                "height" => !empty($resource_height[$key]) ? $resource_height[$key] : 0,
                "size" => !empty($resource_size[$key]) ? $resource_size[$key] : 0
            ));
        }

        foreach ($apk_path as $key => $apk) {
            if (isset($apk_size[$key])) {
                if (strpos($apk_size[$key], 'K') > 0) {
                    $size_app1 = intval(floatval($apk_size[$key]) * 1024);
                } elseif (strpos($apk_size[$key], 'M') > 0) {
                    $size_app1 = intval(floatval($apk_size[$key]) * 1024 * 1024);
                } else {
                    $size_app1 = $apk_size[$key];
                }
            }
            $this->m_History->createHistory(array(
                "app_id" => $insert_id,
                "history_version" => isset($apk_version[$key]) ? $apk_version[$key] : '',
                "history_update_time" => time(),
                "history_size" => isset($apk_size[$key]) ? $size_app1 : '',
                "history_system" => isset($apk_system[$key]) ? $apk_system[$key] : '',
                "data_history_id" => 0,
                "history_type" => 1,
                "history_minSdkVersion" => isset($apk_sdk[$key]) ? $apk_sdk[$key] : '',
                "history_package" => isset($apk_package[$key]) ? $apk_package[$key] : '',
                "history_VersionCode" => isset($apk_code[$key]) ? $apk_sdk[$key] : 0,
                "history_permission" => isset($apk_permission[$key]) ? $apk_permission[$key] : '',
                "history_file" => $apk
            ));
        }
        $this->operate_log('App', 'insert', '添加了应用' . $app_title);
        $this->output->ok_json("添加应用成功");
    }

    /**
     * 应用删除
     * 删除一个应用，先检查这个应用是否在推荐，专题，广告，必须栏目里面，
     * 如果存在，先删除掉
     * 先删除这个应用的评论，资源，版本记录，最后删除这个应用
     */
    public function del() {
        //开始判断
        $params = $this->input->post('params', true);
        $app_id = intval($this->input->post('app_id'));
        $app_name = '';
        if ($app_id > 0) {
            $params = $app_id;
        }
        if (empty($params)) {
            $this->output->error_json(100, "没有选中要删除的应用");
        }
        $ids = explode(',', $params);
        if (!is_array($ids) || sizeof($ids) < 1) {
            $this->output->error_json(101, "没有选中要删除的应用");
        }
        $arr_ids = array();
        $recommend_list = $this->m_Recommend->getRecommendAll();
        $special_list = $this->m_Special->getSpecialAll();
        //31 手助首页轮播广告
        $advert_list = $this->m_Advert->getAdInfoById(31);
        $necessary_list = $this->m_Necessary->getNecessaryAll();
        foreach ($recommend_list as $k => $v) {
            $arr_ids['Recommend_' . $v['area_id']] = explode(',', $v['area_ids']);
        }
        foreach ($special_list as $k => $v) {
            $arr_ids['Special_' . $v['area_id']] = explode(',', $v['area_ids']);
        }

        $arr_ids['Advert_' . $advert_list['ad_id']] = explode('|', $advert_list['ad_links']);
        foreach ($necessary_list as $k => $v) {
            $arr_ids['Necessary_' . $v['necessary_id']] = explode(',', $v['necessary_list']);
        }
        foreach ($ids as $id) {

            $id = intval(trim($id));
            if ($id < 1) {
                continue;
            }
            foreach ($arr_ids as $k => $v) {
                if (in_array($id, $v)) {
                    //删除数组的值；
                    $table_name = explode('_', $k);
                    $table_one = 'm_' . $table_name[0];
                    $table_mode = 'update' . $table_name[0] . 'ById';
                    $key = array_search($id, $v);
                    if ($table_name[0] == 'Advert') {
                        array_splice($v, $key, 1, array(0));
                        $vv_string = implode('|', $v);
                        $data_update = array('ad_links' => $vv_string);
                    } else {
                        array_splice($v, $key, 1);
                        $vv_string = implode(',', $v);
                    }

                    if ($table_name[0] == 'Recommend' || $table_name[0] == 'Special') {
                        $data_update = array('area_ids' => $vv_string);
                    }

                    if ($table_name[0] == 'Necessary') {
                        $data_update = array('necessary_list' => $vv_string);
                    }
                    $this->$table_one->$table_mode($data_update, $table_name[1]);
                }
            }
            $info = $this->m_App->getAppInfoById($id);
            if (!is_array($info) || sizeof($info) < 1) {
                continue;
            }
            $app_name .= $info['app_title'];
            $this->m_AppComment->deleteCommentByApp($id);
            $this->m_Resource->deleteResourceByApp($id);
            $this->m_History->deleteHistoryByApp($id);
            $this->m_App->deleteAppById($id);
        }
        $this->operate_log('App', 'delete', '删除了应用：' . $app_name);
        $this->output->ok_json("删除成功");
    }

    /**
     * 删除一个应用对应的版本
     */
    public function del_history() {
        $history_id = intval($this->input->post('history_id'));
        if ($history_id < 1) {
            $this->output->error_json(100, "没有选中要删除的版本");
        }
        $this->m_History->deleteHistoryById($history_id);
        $this->output->ok_json("删除成功");
    }

    /**
     * 删除一个资源
     */
    public function del_resource() {
        $resource_id = intval($this->input->post('resource_id'));
        if ($resource_id < 1) {
            $this->output->error_json(100, "没有选中要删除的图片");
        }
        $this->m_Resource->deleteResourceById($resource_id);
        $this->output->ok_json("删除成功");
    }

    /**
     * 添加apk url
     */
    public function addApkUrl() {

        $this->load->library('apk_parser');

        $file = $this->input->post('apk_url', true);
        if (empty($file)) {
            $this->output->upload_error('无效的apk文件！');
        }
        if (substr(trim($file), 0, 1) != '/') {
            $this->output->upload_error('文件必须以‘/’开头的绝对路径！');
        }
        if (substr(trim($file), 1, 1) == '\\') {
            $this->output->upload_error('无效的apk路径！！');
        }
        if (preg_match('/[\\\]/', $file)) {
            $file = rtrim($file, '/\\');
            $file = str_replace('\\', '/', $file);
        }
        $file = root_path($file);

        if (!file_exists($file)) {
            $this->output->upload_error('无效的apk文件！');
        }
        if (!$this->apk_parser->open($file)) {
            $this->output->upload_error("无效的apk文件");
        }
        $package = $this->apk_parser->getPackage();
        $version = $this->apk_parser->getVersionName();
        $system = $this->apk_parser->getMinSdkVersionName();
        $code = $this->apk_parser->getVersionCode();
        $sdk = $this->apk_parser->getMinSdkVersion();
        $permission = $this->apk_parser->getPermission();
        $size = filesize($file);

        if ($size > 0 && $size < 999999) {
            $size = round($size / 1024, 2) . 'K';
        } else {
            $size = round($size / 1024 / 1024, 2) . 'M';
        }
        $this->output->upload_ok(array(
            $this->input->post('apk_url', true),
            $version,
            $size,
            $package,
            $system,
            $code,
            $sdk,
            $permission
        ));
    }

    /**
     * apk上传图片处理
     */
    public function addImageUrl() {

        $file = $this->input->post('image_url', true);
        $file = $file ? $file : '';
        if (empty($file)) {
            $this->output->upload_error('无效的图片文件！');
        }

        if (substr(trim($file), 0, 1) != '/') {
            $this->output->upload_error('文件必须以‘/’开头的绝对路径！');
        }
        if (substr(trim($file), 1, 1) == '\\') {
            $this->output->upload_error('无效的图片路径！！');
        }

        if (preg_match('/[\\\]/', $file)) {
            $file = rtrim($file, '/\\');
            $file = str_replace('\\', '/', $file);

        }
        $file = root_path($file);

        if (!file_exists($file)) {
            $this->output->upload_error('无效的图片文件！！');
        }

        $file2 = explode('/', $file);
        $name = array_pop($file2);

        $ext = strtolower(ltrim($name, '.'));

        // Images get some additional checks
        if (in_array($ext, array('gif', 'jpg', 'jpeg', 'jpe', 'png'), TRUE) && @getimagesize($file) === FALSE) {
            $this->output->upload_error('上传文件类型错误！');
        }
        list($width, $height, $type, $attr) = getimagesize($file);
        $size = filesize($file);
        $size = round($size / 1024, 2) . 'K';

        $this->add_watermark($file);

        $this->output->upload_ok(array(
            $this->input->post('image_url', true),
            $width,
            $height,
            $size
        ));
    }

    /**
     * 上传图片加水印
     * @param $image
     * @return bool
     */
    protected function add_watermark($image) {
        $this->load->library('image_lib');
        $water_button = isset($this->_site['water_button']) ? $this->_site['water_button'] : 0;
        $water_logo = isset($this->_site['water_logo']) ? $this->_site['water_logo'] : '';
        if ($water_button != 1) {
            return true;
        }
        $config = array();
        $config['source_image'] = $image;
        $config['dynamic_output'] = false;
        $config['wm_opacity'] = '50';
        $config['wm_vrt_alignment'] = 'bottom';
        $config['wm_hor_alignment'] = 'right';

        if(!$water_logo) {
            $config['wm_type'] = 'text';
            $config['wm_text'] = $this->_site['site_url'];
            $config['wm_font_path'] = BASEPATH.'fonts/texb.ttf';
            $config['wm_font_size'] = 12;
        }else {
            $config['wm_overlay_path'] = $water_logo;
            $config['wm_type'] = 'overlay';
            $config['wm_hor_offset'] = '10';
            $config['wm_vrt_offset'] = '10';
        }

        $this->image_lib->initialize($config);
        $this->image_lib->watermark();
    }

    /**
     * 添加远程应用链接
     */
    public function remoteLink() {
        $url = $this->input->post_get('url', true);
        $package = '';
        $version = '';
        $system = '';
        $code = '';
        $sdk = '';
        $permission = '';
        $size = 0;

        $this->output->ok_json(array(
            $url,
            $version,
            $size,
            $package,
            $system,
            $code,
            $sdk,
            $permission
        ));
    }

    /**
     * 添加远程图片,保存到本地
     */
    public function remoteImage() {
        $url = $this->input->post_get('url', true);
        $info = parse_url($url);
        if(!$info['path']){
            $this->output->error_json('101','输入url地址');
        }
        $info = pathinfo($info['path']);
        if(!$info['extension'] || !in_array($info['extension'],array('jpg','jpeg','png','gif'))){
            $this->output->error_json('102','输入图片地址');
        }
        $name = md5(time()).'.'.$info['extension'];
        $file = UPLOADPATH.'images/'.$name;
        $ret = $this->http_client->save($url,$file);
        $this->add_watermark($file);
        if($ret === TRUE){
            $size = filesize($file);
            list($width, $height, $type, $attr) = getimagesize($file);

            $this->output->ok_json(array(
                '/uploads/images/'.$name,
                $width,
                $height,
                $size,
            ));
        }else{
            $this->output->error_json('101',$ret);
        }
    }
}