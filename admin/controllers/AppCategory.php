<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 分类管理
 * Class AppCategory
 */
class AppCategory extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_AppCategory');
        $this->load->model('m_App');
    }

    /**
     * 分类列表页面
     */
    public function main()
    {
        $types = array(1 => '软件', 2 => '游戏');
        $this->_data['types'] = $types;

        $page = intval($this->input->get('page'));
        if ($page < 1) {
            $page = 1;
        }
        $where = array();
        $count = $this->m_AppCategory->getCategoryCount($where);

        $config = $this->config->item('pagination');
        $config['base_url']   = build_url('appCategory');
        $config['total_rows'] = $count;
        $this->pagination->initialize($config);

        $limit  = $config['per_page'];
        $offset = ($page - 1) * $config['per_page'];
        $list = $this->m_AppCategory->getCategoryList($where, $limit, $offset);
        foreach($list as $k=>$v){
            $where_cate = array('last_cate_id'=>$v['cate_id']);
            $cate_count = $this->m_App->getAppCount($where_cate);
            $list[$k]['cate_count'] = $cate_count;
        }
        $this->_data['count']  = $count;
        $this->_data['limit']  = $limit;
        $this->_data['offset'] = $offset;
        $this->_data['list']   = $list;
        $this->loadView('/AppCategory/index');
    }

    /**
     * 具体分类展示
     */
    public function content()
    {
        $all = $this->m_AppCategory->getCategoryAll(array("parent_id" => 0));
        $this->_data['all'] = $all;

        $info = array();
        $cate_id = intval($this->input->get('cate_id'));
        if ($cate_id > 0) {
            $info = $this->m_AppCategory->getCategoryInfoById($cate_id);
        }
        $this->_data['info'] = $info;
        $this->_data['time'] = time();
        $this->_data['token'] = $this->getUploadToken($this->_data['time']);
        $this->loadView('/AppCategory/content');
    }

    /**
     * 分类保存
     */
    public function save()
    {
        $cate_id = intval($this->input->get('cate_id'));

        $parent_id = intval($this->input->post('parent_id'));
        if ($parent_id < 1) {
            $this->output->error_json(100, "请选择分类的类型");
        }
        $cname = $this->input->post("cname", true);
        if (empty($cname)) {
            $this->output->error_json(100, "分类名称必须填写");
        }
        $cname_py = $this->input->post("cname_py", true);
        if (empty($cname_py)) {
            $this->output->error_json(100, "分类拼音必须填写");
        }

        $ctitle         = $this->input->post('ctitle', true);
        $ckey           = $this->input->post('ckey', true);
        $cdesc          = $this->input->post('cdesc', true);
        $corder         = $this->input->post('corder', true);
        $cat_show       = $this->input->post('cat_show', true);
        $cate_logo      = $this->input->post('cate_logo', true);
        $app_ctitle     = $this->input->post('app_ctitle', true);
        $app_ckey       = $this->input->post('app_ckey', true);
        $app_cdesc      = $this->input->post('app_cdesc', true);

        if ($cate_id > 0) {
            $info = $this->m_AppCategory->getCategoryInfoById($cate_id);
            if (!is_array($info) || sizeof($info) < 1) {
                $this->output->error_json(100, "没有此分类");
            }
            $data = array();
            if ($parent_id) {
                $data["parent_id"] = $parent_id;
            }
            if ($cname) {
                $data["cname"] = $cname;
            }
            if ($cname_py) {
                $data["cname_py"] = $cname_py;
            }
            if ($ctitle) {
                $data["ctitle"] = $ctitle;
            }
            if ($ckey) {
                $data["ckey"] = $ckey;
            }
            if ($cdesc) {
                $data["cdesc"] = $cdesc;
            }
            if (isset($corder)) {
                $data["corder"] = $corder;
            }
            if ($cat_show) {
                $data["cat_show"] = $cat_show;
            }
            if ($cate_logo) {
                $data["cate_logo"] = $cate_logo;
            }
            if ($app_ctitle) {
                $data["app_ctitle"] = $app_ctitle;
            }
            if ($app_ckey) {
                $data["app_ckey"] = $app_ckey;
            }
            if ($app_cdesc) {
                $data["app_cdesc"] = $app_cdesc;
            }

            $result = $this->m_AppCategory->updateCategoryById($data, $cate_id);
            if ($result) {
                $this->operate_log('AppCategory','update','修改了分类：'.$cname);
                $this->output->ok_json("修改分类成功");
            }
            $this->operate_log('AppCategory','update','修改分类失败：'.$cname);
            $this->output->error_json(100, "修改分类失败");
        }

        $py = $this->m_AppCategory->getCategoryInfoByPy($cname_py);
        if (is_array($py) && sizeof($py) > 0) {
            $this->output->error_json(100, "字母别名不允许重复");
        }

        $result = $this->m_AppCategory->createCategory(array(
            "parent_id"     => $parent_id,
            "cname"         => $cname,
            "cname_py"      => $cname_py,
            "ctitle"        => $ctitle,
            "ckey"          => $ckey,
            "cdesc"         => $cdesc,
            "corder"        => $corder,
            "cat_show"      => $cat_show,
            "cate_logo"     => $cate_logo,
            "app_ctitle"    => $app_ctitle,
            "app_ckey"      => $app_ckey,
            "app_cdesc"     => $app_cdesc,
        ));
        if ($result) {
            $this->operate_log('AppCategory','insert','添加了分类：'.$cname);
            $this->output->ok_json("添加分类成功");
        }
        $this->operate_log('AppCategory','insert','添加分类失败：'.$cname);
        $this->output->error_json(100, "添加分类失败");
    }

    /**
     * 分类删除
     */
    public function delete()
    {
        $cate_id = intval($this->input->post('cate_id'));
        if ($cate_id < 1) {
            $this->output->error_json(100, "请输入分类ID");
        }
        $info = $this->m_AppCategory->getCategoryInfoById($cate_id);
        if (!is_array($info) || sizeof($info) < 1) {
            $this->output->error_json(100, "没有此分类");
        }
        $children  = $this->m_AppCategory->getCategoryAll(array('parent_id' => $cate_id));
        if (is_array($children) && sizeof($children) > 0) {
            $this->output->error_json(100, "有子分类，不可删除");
        }
        $has = $this->m_App->getAppCount(array('last_cate_id' => $cate_id));
        if ($has > 0) {
            $this->output->error_json(100, "分类下面有应用，不可删除");
        }
        $this->m_AppCategory->deleteCategoryById($cate_id);

        $this->operate_log('AppCategory','delete','删除了分类：'.$info['cname']);
        $this->output->ok_json("分类删除成功");
    }

}