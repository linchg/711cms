<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 搜索关键字管理
 * Class Search
 */
class Search extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_Search');
    }

    /**
     * 搜索关键字管理首页
     */
    public function main()
    {
        $page = intval($this->input->get('page'));
        if ($page < 1) {
            $page = 1;
        }

        $where = array();
        
        $search_txt  = $this->input->get('search_txt', true);
        if (!empty($search_txt)) {
            $where['q like'] = '%' . trim($search_txt) . '%';
        }
        $this->_data['search_txt']   = $search_txt;

        $count = $this->m_Search->getSearchCount($where);

        $config = $this->config->item('pagination');
        $config['base_url']   = build_url('search');
        $config['total_rows'] = $count;
        $this->pagination->initialize($config);

        $limit  = $config['per_page'];
        $offset = ($page - 1) * $config['per_page'];
        $list = $this->m_Search->getSearchList($where, $limit, $offset);

        $this->_data['count']  = $count;
        $this->_data['limit']  = $limit;
        $this->_data['offset'] = $offset;
        $this->_data['list']   = $list;

        $this->loadView('/Search/index');
    }

    /**
     * 关键字管理
     */
    public function content()
    {
        $info = array();
        $q_id = intval($this->input->get('q_id'));
        if ($q_id > 0) {
            $info = $this->m_Search->getSearchById($q_id);
        }
        $this->_data['info'] = $info;
        $this->loadView('/Search/content');
    }

    /**
     * 关键字保存
     */
    public function save()
    {
        $q_id  = intval($this->input->get('q_id'));

        $q      = $this->input->post('q', true);
        $qnum   = intval($this->input->post('qnum', true));
        $qorder = intval($this->input->post('qorder', true));
        $q_type = intval($this->input->post('q_type', true));

        if ($q_id > 0) {
            $info = $this->m_Search->getSearchById($q_id);
            if (!is_array($info) || sizeof($info) < 1) {
                $this->output->error_json(100, '没有此内链');
            }
            $data = array();
            if ($q) {
                $data['q'] = $q;
            }
            if ($qnum) {
                $data['qnum'] = $qnum;
            }
            if ($qorder) {
                $data['qorder'] = $qorder;
            }
            if($q_type){
                $data['q_type'] = $q_type;
            }
            $result = $this->m_Search->updateSearchById($data, $q_id);
            if ($result) {
                $this->operate_log('Search','update','修改了关键字：'.$q);
                $this->output->ok_json("更新关键字成功");
            }
            $this->operate_log('Search','update','修改关键字失败：'.$q);
            $this->output->error_json(100, "编辑关键字失败");
        }

        $result = $this->m_Search->createSearch(array(
            'q'      => $q,
            'qnum'   => $qnum,
            'qorder' => $qorder,
            'q_type' => $q_type
        ));
        if ($result) {
            $this->operate_log('Search','insert','添加了关键字：'.$q);
            $this->output->ok_json("添加关键字成功");
        }
        $this->operate_log('Search','insert','添加了关键字失败：'.$q);
        $this->output->error_json(100, "添加关键字失败");
    }

    /**
     * 关键字删除
     */
    public function delete()
    {
        $q_id = intval($this->input->post('q_id'));
        if ($q_id < 1) {
            $this->output->error_json(100, "请输入关键字ID");
        }
        $info = $this->m_Search->getSearchById($q_id);
        if (!is_array($info) || sizeof($info) < 1) {
            $this->output->error_json(100, "没有此关键字");
        }
        $this->m_Search->deleteSearchById($q_id);
        $this->operate_log('Search','delete','删除了关键字：'.$info['q']);
        $this->output->ok_json("关键字删除成功");
    }
}
