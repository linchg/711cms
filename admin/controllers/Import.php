<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 文章入库管理
 * Class Import
 */
class Import extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_InfoCategory');
        $this->load->model('m_Import');
        $this->load->model('m_Gather');
        $this->load->model('m_Info');
    }

    /**
     * 入库管理首页
     */
    public function main()
    {
        $page = intval($this->input->get('page'));
        if ($page < 1) {
            $page = 1;
        }

        $where = array();

        $last_cate_id = intval($this->input->get('last_cate_id'));
        $search_type = $this->input->get('search_type', true);
        $search_txt  = $this->input->get('search_txt', true);
        if ($search_type == 'info_id' && $search_txt > 0) {
            $where['info_id'] = trim($search_txt);
        }
        if ($search_type == 'info_title' && !empty($search_txt)) {
            $where["info_title like"] = '%' . trim($search_txt) . '%';
        }
        if ($last_cate_id > 0) {
            $where['last_cate_id'] = $last_cate_id;
        }
        $this->_data['last_cate_id'] = $last_cate_id;
        $this->_data['search_type']  = $search_type;
        $this->_data['search_txt']   = $search_txt;

        $info_id = intval($this->input->post('info_id'));
        if ($info_id > 0) {
            $where['info_id'] = $info_id;
        }
        $this->_data['info_id'] = $info_id;

        $count = $this->m_Import->getImportCount($where);
        $config = $this->config->item('pagination');
        $config['base_url']   = build_url('import');
        $config['total_rows'] = $count;
        $this->pagination->initialize($config);

        $category = $this->m_InfoCategory->getCategoryAll(array('parent_id >' => 0));
        $cates = array();
        if (is_array($category) && sizeof($category) > 0) {
            foreach ($category as $value) {
                $cates[$value['cate_id']] = $value['cname'];
            }
        }
        $this->_data['cates'] = $cates;
        $this->_data['category'] = $category;

        $limit  = $config['per_page'];
        $offset = ($page - 1) * $config['per_page'];
        $list = $this->m_Import->getImportList($where, $limit, $offset);

        $gather = array();
        if (is_array($list) && sizeof($list) > 0) {
            foreach ($list as $value) {
                if (!isset($gather[$value['gather_id']])) {
                    $gather_info = $this->m_Gather->getGatherById($value['gather_id']);
                    if (!is_array($gather_info) || sizeof($gather_info) < 1) {
                        continue;
                    }
                    $gather[$value['gather_id']] = $gather_info;
                }
            }
        }
        $this->_data['gather'] = $gather;

        $this->_data['count']  = $count;
        $this->_data['limit']  = $limit;
        $this->_data['offset'] = $offset;
        $this->_data['list']   = $list;

        $this->loadView('/Import/index');
    }

    /**
     * 入库管理
     */
    public function content()
    {
        $info_id = intval($this->input->get('info_id'));
        $info = array();
        if ($info_id > 0) {
            $info = $this->m_Import->getImportById($info_id);
        }
        $this->_data['info'] = $info;

        $category = $this->m_InfoCategory->getCategoryAll();
        $this->_data['category'] = $category;
        $this->_data['time'] = time();
        $this->_data['token'] = $this->getUploadToken($this->_data['time']);

        $this->loadView('/Import/content');
    }

    /**
     * 保存
     */
    public function save()
    {
        $info_id = intval($this->input->get('info_id'));

        $last_cate_id       = intval($this->input->post('last_cate_id'));
        $info_title         = $this->input->post('info_title');
        $info_stitle        = $this->input->post('info_stitle');
        $info_img           = $this->input->post('info_img');
        $info_desc          = $this->input->post('info_desc');
        $info_body          = $this->input->post('info_body');
        $info_tags          = $this->input->post('info_tags');
        $info_from          = $this->input->post('info_from');
        $info_comments      = intval($this->input->post('info_comments'));
        $info_visitors      = intval($this->input->post('info_visitors'));
        $info_order         = intval($this->input->post('info_order'));
        $info_url           = $this->input->post('info_url');
        $info_publish_time  = $this->input->post('info_publish_time');
        $info_seodesc       = $this->input->post('info_seodesc');
        $info_seokey        = $this->input->post('info_seokey');
        $info_status        = intval($this->input->post('info_status'));

        if ($info_id > 0) {
            $info = $this->m_Import->getImportById($info_id);
            if (!is_array($info) || sizeof($info) < 1) {
                $this->output->error_json(100, '没有此文章');
            }
            $data = array();
            if ($last_cate_id) {
                $data['last_cate_id']       = $last_cate_id;
            }
            if ($info_title) {
                $data['info_title']         = $info_title;
            }
            if ($info_stitle) {
                $data['info_stitle']        = $info_stitle;
            }
            if ($info_img) {
                $data['info_img']           = $info_img;
            }
            if ($info_desc) {
                $data['info_desc']          = $info_desc;
            }
            if ($info_body) {
                $data['info_body']          = $info_body;
            }
            if ($info_tags) {
                $data['info_tags']          = $info_tags;
            }
            if ($info_from) {
                $data['info_from']          = $info_from;
            }
            if ($info_comments) {
                $data['info_comments']      = $info_comments;
            }
            if ($info_visitors) {
                $data['info_visitors']      = $info_visitors;
            }
            if ($info_order) {
                $data['info_order']         = $info_order;
            }
            if ($info_url) {
                $data['info_url']           = $info_url;
            }
            if ($info_publish_time) {
                $data['info_publish_time']  = $info_publish_time;
            }
            if ($info_seodesc) {
                $data['info_seodesc']       = $info_seodesc;
            }
            if ($info_seokey) {
                $data['info_seokey']        = $info_seokey;
            }
            if ($info_status) {
                $data['info_status']        =  $info_status;
            }
            $data['info_update_time']       = time();
            $data['uid']                    = $this->_uid;

            $result = $this->m_Import->updateImportById($data, $info_id);
            if ($result) {
                $this->operate_log('Import','update','修改了采集文章：'.$info_title);
                $this->output->ok_json("更新文章成功");
            }
            $this->output->error_json(100, "编辑文章失败");
            $this->operate_log('Import','update','修改采集文章失败：'.$info_title);
        }

    }

    /**
     * 删除
     */
    public function import_del()
    {
        $info_id = intval($this->input->post('info_id'));
        if ($info_id < 1) {
            $this->output->error_json(100, "请输入文章ID");
        }
        $info = $this->m_Import->getImportById($info_id);
        if (!is_array($info) || sizeof($info) < 1) {
            $this->output->error_json(100, "没有此文章");
        }
        $this->m_Import->deleteImportById($info_id);

        $this->operate_log('Import','delete','删除了采集文章：'.$info['info_title']);
        $this->output->ok_json("文章删除成功");
    }

    /**
     * 正式转成文章
     */
    public function import_info() {

        $info_id = intval($this->input->post('info_id'));
        if ($info_id < 1) {
            $this->output->error_json(100, "请输入文章ID");
        }
        $info = $this->m_Import->getImportById($info_id);
        if (!is_array($info) || sizeof($info) < 1) {
            $this->output->error_json(100, "没有此文章");
        }

        $result = $this->m_Info->createInfo(array(
            'last_cate_id'       => $info['last_cate_id'],
            'info_title'         => $info['info_title'],
            'info_stitle'        => $info['info_stitle'],
            'info_img'           => $info['info_img'],
            'info_desc'          => $info['info_desc'],
            'info_body'          => $info['info_body'],
            'info_tags'          => $info['info_tags'],
            'info_from'          => $info['info_from'],
            'info_comments'      => $info['info_comments'],
            'info_visitors'      => $info['info_visitors'],
            'info_order'         => $info['info_order'],
            'info_url'           => $info['info_url'],
            'info_publish_time'  => $info['info_publish_time'],
            'info_seodesc'       => $info['info_seodesc'],
            'info_seokey'        => $info['info_seokey'],
            'info_update_time'   => $info['info_update_time'],
            'info_author'        => isset($info['info_author']) ? $info['info_author'] : '',
            'create_time'        => $info['create_time'],
            'uid'                => $this->_uid,
            'info_status'        => 1,
        ));
        if ($result) {
            $this->m_Import->deleteImportById($info_id);
            $this->operate_log('Import','insert','添加了采集文章：'.$info['info_title']);
            $this->output->ok_json("添加文章成功");
        }
        $this->output->error_json(100, "添加文章失败");
        $this->operate_log('Import','insert','添加采集文章失败：'.$info['info_title']);
    }

    /**
     * 正式转成文章，加分类和标题
     */
    public function import_info2() {

        $info_id = intval($this->input->post('info_id'));
        $last_cate_id = intval($this->input->post('last_cate_id'));
        $info_title = trim($this->input->post('info_title'));
        if($last_cate_id <= 0){
            $this->output->error_json(100, "请选择分类");
        }
        if ($info_id < 1) {
            $this->output->error_json(100, "请输入文章ID");
        }

        $info = $this->m_Import->getImportById($info_id);

        $info2 = $this->m_Info->getInfoByName($info_title);
        if (!is_array($info) || sizeof($info) < 1) {
            $this->output->error_json(100, "没有此文章");
        }
        if (is_array($info2) && sizeof($info2) >= 1) {
            $this->m_Import->deleteImportById($info_id);
            $this->output->error_json(0, "此文章已经存在");
        }
        $result = $this->m_Info->createInfo(array(
            'last_cate_id'       => $last_cate_id > 0 ? $last_cate_id : $info['last_cate_id'],
            'info_title'         => $info['info_title'],
            'info_stitle'        => $info['info_stitle'],
            'info_img'           => $info['info_img'],
            'info_desc'          => $info['info_desc'],
            'info_body'          => $info['info_body'],
            'info_tags'          => $info['info_tags'],
            'info_from'          => $info['info_from'],
            'info_comments'      => $info['info_comments'],
            'info_visitors'      => $info['info_visitors'],
            'info_order'         => $info['info_order'],
            'info_url'           => $info['info_url'],
            'info_publish_time'  => $info['info_publish_time'],
            'info_seodesc'       => $info['info_seodesc'],
            'info_seokey'        => $info['info_seokey'],
            'info_update_time'   => $info['info_update_time'],
            'info_author'        => isset($info['info_author']) ? $info['info_author'] : '',
            'create_time'        => $info['create_time'],
            'uid'                => $this->_uid,
            'info_status'        => 1,
        ));

        if ($result) {
            $this->m_Import->deleteImportById($info_id);
            $this->output->ok_json("添加文章成功");
        }
        $this->output->error_json(100, "添加文章失败");
    }
}
