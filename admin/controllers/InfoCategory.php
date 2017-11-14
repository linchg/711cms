<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 文章分类管理
 * Class InfoCategory
 */
class InfoCategory extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_InfoCategory');
        $this->load->model('m_Info');
    }

    /**
     * 文章分类管理主页
     */
    public function main()
    {
        $types = array(1 => '资讯');
        $this->_data['types'] = $types;

        $page = intval($this->input->get('page'));
        if ($page < 1) {
            $page = 1;
        }
        $where = array();
        $count = $this->m_InfoCategory->getCategoryCount($where);

        $config = $this->config->item('pagination');
        $config['base_url']   = build_url('adminUser');
        $config['total_rows'] = $count;
        $this->pagination->initialize($config);

        $limit  = $config['per_page'];
        $offset = ($page - 1) * $config['per_page'];
        $list = $this->m_InfoCategory->getCategoryList($where, $limit, $offset);

        $this->_data['count']  = $count;
        $this->_data['limit']  = $limit;
        $this->_data['offset'] = $offset;
        $this->_data['list']   = $list;
        $this->loadView('/InfoCategory/index');
    }

    /**
     * 具体分类
     */
    public function content()
    {
        $all = $this->m_InfoCategory->getCategoryAll(array("parent_id" => 0));
        $this->_data['all'] = $all;

        $info = array();
        $cate_id = intval($this->input->get('cate_id'));
        if ($cate_id > 0) {
            $info = $this->m_InfoCategory->getCategoryInfoById($cate_id);
        }
        $this->_data['info'] = $info;
        $this->loadView('/InfoCategory/content');
    }

    /**
     * 分类保存
     */
    public function save()
    {
        $cate_id = intval($this->input->get('cate_id'));

        $parent_id = 1;
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

        if ($cate_id > 0) {
            $info = $this->m_InfoCategory->getCategoryInfoById($cate_id);
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
            if ($corder) {
                $data["corder"] = $corder;
            }
            if ($cat_show) {
                $data["cat_show"] = $cat_show;
            }
            $result = $this->m_InfoCategory->updateCategoryById($data, $cate_id);
            if ($result) {
                $this->operate_log('InfoCategory','update','修改了分类：'.$cname);
                $this->output->ok_json("修改分类成功");
            }
            $this->operate_log('InfoCategory','update','修改分类失败：'.$cname);
            $this->output->error_json(100, "修改分类失败");
        }

        $py = $this->m_InfoCategory->getCategoryInfoByPy($cname_py);
        if (is_array($py) && sizeof($py) > 0) {
            $this->output->error_json(100, "字母别名不允许重复");
        }

        $result = $this->m_InfoCategory->createCategory(array(
            "parent_id"     => $parent_id,
            "cname"         => $cname,
            "cname_py"      => $cname_py,
            "ctitle"        => $ctitle,
            "ckey"          => $ckey,
            "cdesc"         => $cdesc,
            "corder"        => $corder,
            "cat_show"      => $cat_show,
        ));
        if ($result) {
            $this->operate_log('InfoCategory','insert','添加了分类：'.$cname);
            $this->output->ok_json("添加分类成功");
        }
        $this->operate_log('InfoCategory','insert','添加分类失败：'.$cname);
        $this->output->error_json(100, "添加分类失败");
    }

    /**
     * 删除
     */
    public function delete()
    {
        $cate_id = intval($this->input->post('cate_id'));
        if ($cate_id < 1) {
            $this->output->error_json(100, "请输入分类ID");
        }
        $info = $this->m_InfoCategory->getCategoryInfoById($cate_id);
        if (!is_array($info) || sizeof($info) < 1) {
            $this->output->error_json(100, "没有此分类");
        }
        $children  = $this->m_InfoCategory->getCategoryAll(array('parent_id' => $cate_id));
        if (is_array($children) && sizeof($children) > 0) {
            $this->output->error_json(100, "有子分类，不可删除");
        }
        $has = $this->m_Info->getInfoCount(array('last_cate_id' => $cate_id));
        if ($has > 0) {
            $this->output->error_json(100, "分类下面有应用，不可删除");
        }
        $this->m_InfoCategory->deleteCategoryById($cate_id);
        $this->operate_log('InfoCategory','delete','删除了分类：'.$info['cname']);
        $this->output->ok_json("分类删除成功");
    }

}