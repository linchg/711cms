<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 后台操作日志管理
 * Class OperateLog
 */
class OperateLog extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_Operate_log');
    }

    /**
     * 操作日志主页
     */
    public function main()
    {
        $page = intval($this->input->get('page'));
        if ($page < 1) {
            $page = 1;
        }
        $where = array();
        $count = $this->m_Operate_log->getOperateLogCount($where);

        $config = $this->config->item('pagination');
        $config['base_url'] = build_url('OperateLog');
        $config['total_rows'] = $count;
        $this->pagination->initialize($config);

        $limit = $config['per_page'];
        $offset = ($page - 1) * $config['per_page'];
        $list = $this->m_Operate_log->getOperateLogList($where, $limit, $offset);

        $this->_data['count'] = $count;
        $this->_data['limit'] = $limit;
        $this->_data['offset'] = $offset;
        $this->_data['list'] = $list;

        $this->loadView('/OperateLog/index');
    }
}
