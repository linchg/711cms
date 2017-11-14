<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Necessary
 * 必备管理
 */
class Necessary extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_Necessary');
    }

    /**
     * 必备管理主页
     */
    public function main()
    {
        $types = array(1 => '应用', 2 => '游戏');
        $this->_data['types'] = $types;

        $page = intval($this->input->get('page'));
        if ($page < 1) {
            $page = 1;
        }
        $where = array();
        $count = $this->m_Necessary->getNecessaryCount($where);
        $config = $this->config->item('pagination');
        $config['base_url']   = build_url('necessary');
        $config['total_rows'] = $count;
        $this->pagination->initialize($config);

        $limit  = $config['per_page'];
        $offset = ($page - 1) * $config['per_page'];
        $list = $this->m_Necessary->getNecessaryList($where, $limit, $offset);

        $this->_data['count']  = $count;
        $this->_data['limit']  = $limit;
        $this->_data['offset'] = $offset;
        $this->_data['list']   = $list;

        $this->loadView("/Necessary/index");
    }

    /**
     * 某个必备
     */
    public function content()
    {
        $info = array();
        $necessary_id = intval($this->input->get('necessary_id'));
        if ($necessary_id > 0) {
            $info = $this->m_Necessary->getNecessaryInfoById($necessary_id);
        }
        $this->_data['info'] = $info;
        $this->loadView('/Necessary/content');
    }

    /**
     * 保存
     */
    public function save()
    {
        $necessary_id       = intval($this->input->get('necessary_id'));
        $necessary_title    = $this->input->post('necessary_title', true);
        $necessary_type     = intval($this->input->post('necessary_type'));
        $necessary_remarks  = $this->input->post('necessary_remarks', true);
        $necessary_html     = $this->input->post('necessary_html', true);
        $necessary_order    = intval($this->input->post('necessary_order'));
        $necessary_list     = $this->input->post('necessary_list', true);

        if (empty($necessary_title)) {
            $this->output->error_json(100, "标题不能为空");
        }

        if ($necessary_id > 0) {
            $info = $this->m_Necessary->getNecessaryInfoById($necessary_id);
            if (!is_array($info) || sizeof($info) < 1) {
                $this->output->error_json(300, "没有此装机必备");
            }
            $data = array();
            if ($necessary_title) {
                $data['necessary_title']    = $necessary_title;
            }
            if ($necessary_type) {
                $data['necessary_type']     = $necessary_type;
            }
            if ($necessary_remarks) {
                $data['necessary_remarks']  = $necessary_remarks;
            }
            if ($necessary_html) {
                $data['necessary_html']     = $necessary_html;
            }
            if ($necessary_order) {
                $data['necessary_order']    = $necessary_order;
            }
            if ($necessary_list) {
                $data['necessary_list']     = $necessary_list;
            }
            $data['necessary_time'] = time();
            $data['uid'] = $this->_uid;

            $result = $this->m_Necessary->updateNecessaryById($data, $necessary_id);
            if ($result) {
                $this->operate_log('Necessary','update','修改了装机必备：'.$necessary_title);
                $this->output->ok_json("修改装机必备成功");
            }
            $this->operate_log('Necessary','update','修改装机必备失败：'.$necessary_title);
            $this->output->error_json(200, "修改装机必备失败");
        }

        $data = array(
            "necessary_title"    => $necessary_title,
            'necessary_type'     => $necessary_type,
            'necessary_html'     => $necessary_html,
            'necessary_remarks'  => $necessary_remarks,
            'necessary_order'    => $necessary_order,
            'necessary_list'     => $necessary_list,
            'necessary_time'     => time(),
            'uid'                => $this->_uid
        );
        $result = $this->m_Necessary->createNecessary($data);
        if ($result) {
            $this->operate_log('Necessary','insert','添加了装机必备：'.$necessary_title);
            $this->output->ok_json("添加装机必备成功");
        }
        $this->operate_log('Necessary','insert','添加装机必备失败：'.$necessary_title);
        $this->output->error_json(200, "添加装机必备失败, 请核对后重新添加");
    }

    /**
     * 删除
     */
    public function del()
    {
        $necessary_id = intval($this->input->post("necessary_id"));
        if ($necessary_id < 1) {
            $this->output->error_json(100, "请输入装机必备ID");
        }
        $info = $this->m_Necessary->getNecessaryInfoById($necessary_id);
        if (!is_array($info) || sizeof($info) < 1) {
            $this->output->error_json(100, "没有此装机必备");
        }
        $this->m_Necessary->deleteNecessaryById($necessary_id);
        $this->operate_log('Necessary','delete','删除了装机必备：'.$info['necessary_title']);
        $this->output->ok_json('删除装机必备成功');
    }

}
