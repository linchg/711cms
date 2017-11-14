<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 资讯内链管理
 * Class Nlink
 */
class Nlink extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_Nlink');
    }

    /**
     * 内链管理首页
     */
    public function main()
    {
        $page = intval($this->input->get('page'));
        if ($page < 1) {
            $page = 1;
        }
        $where = array();

        $search_type = $this->input->get('search_type', true);
        $search_txt  = $this->input->get('search_txt', true);

        if ($search_type == 'nlink_txt' && !empty($search_txt)) {
            $where["nlink_txt like"] = '%' . trim($search_txt) . '%';
        }
        if ($search_type == 'nlink_url' && !empty($search_txt)) {
            $where["nlink_url like"] = '%' . trim($search_txt) . '%';
        }
        $this->_data['search_type']  = $search_type;
        $this->_data['search_txt']   = $search_txt;

        $count = $this->m_Nlink->getNlinkCount($where);

        $config = $this->config->item('pagination');
        $config['base_url']   = build_url('nlink');
        $config['total_rows'] = $count;
        $this->pagination->initialize($config);

        $limit  = $config['per_page'];
        $offset = ($page - 1) * $config['per_page'];
        $list = $this->m_Nlink->getNlinkList($where, $limit, $offset);

        $this->_data['count']  = $count;
        $this->_data['limit']  = $limit;
        $this->_data['offset'] = $offset;
        $this->_data['list']   = $list;

        $this->loadView('/Nlink/index');
    }

    /**
     * 具体内链
     */
    public function content()
    {
        $info = array();
        $nlink_id = intval($this->input->get('nlink_id'));
        if ($nlink_id > 0) {
            $info = $this->m_Nlink->getNlinkById($nlink_id);
        }
        $this->_data['info'] = $info;
        $this->loadView('/Nlink/content');
    }

    /**
     * 保存
     */
    public function save()
    {
        $nlink_id  = intval($this->input->get('nlink_id'));

        $nlink_txt = $this->input->post('nlink_txt', true);
        $nlink_url = $this->input->post('nlink_url', true);

        if ($nlink_id > 0) {
            $info = $this->m_Nlink->getNlinkById($nlink_id);
            if (!is_array($info) || sizeof($info) < 1) {
                $this->output->error_json(100, '没有此内链');
            }
            $data = array();
            if ($nlink_txt) {
                $data['nlink_txt'] = $nlink_txt;
            }
            if ($nlink_url) {
                $data['nlink_url'] = $nlink_url;
            }
            $result = $this->m_Nlink->updateNlinkById($data, $nlink_id);
            if ($result) {
                $this->operate_log('Nlink','update','修改了内链：'.$nlink_txt);
                $this->output->ok_json("更新内链成功");
            }
            $this->operate_log('Nlink','update','修改内链失败：'.$nlink_txt);
            $this->output->error_json(100, "编辑内链失败");
        }

        $result = $this->m_Nlink->createNlink(array(
            'nlink_txt' => $nlink_txt,
            'nlink_url' => $nlink_url,
        ));
        if ($result) {
            $this->operate_log('Nlink','insert','添加了内链：'.$nlink_txt);
            $this->output->ok_json("添加内链成功");
        }
        $this->operate_log('Nlink','insert','添加内链失败：'.$nlink_txt);
        $this->output->error_json(100, "添加内链失败");
    }

    /**
     * 删除
     */
    public function delete()
    {
        $nlink_id = intval($this->input->post('nlink_id'));
        if ($nlink_id < 1) {
            $this->output->error_json(100, "请输入文章ID");
        }
        $info = $this->m_Nlink->getNlinkById($nlink_id);
        if (!is_array($info) || sizeof($info) < 1) {
            $this->output->error_json(100, "没有此内链");
        }
        $this->m_Nlink->deleteNlinkById($nlink_id);
        $this->operate_log('Nlink','delete','删除了内链：'.$info['nlink_txt']);
        $this->output->ok_json("内链删除成功");
    }

}
