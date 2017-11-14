<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 统计管理
 * Class Counter
 */
class Counter extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_App');
        $this->load->model('m_Counter');
    }

    /**
     * 统计管理主页
     */
    public function main()
    {
        $page = intval($this->input->get('page'));
        if ($page < 1) {
            $page = 1;
        }
        $where = array();
        $start = intval($this->input->get('start', true));
        $start = empty($start) ? intval(date('Ymd')) : $start;
        $this->_data['start'] = $start;
        $stop = intval($this->input->get('stop', true));
        $stop = empty($stop) ? intval(date('Ymd')) : $stop;
        $this->_data['stop'] = $stop;
        if($start >= $stop){
            $where['date'] = $start;
        }else{
            $where['date >='] = $start;
            $where['date <='] = $stop;
        }
        $app_id = intval($this->input->get('app_id'));
        if ($app_id > 0) {
            $where['app_id'] = $app_id;
        }
        $this->_data['app_id'] = $app_id;
        $order_by = 'date desc';
        $order = intval($this->input->get('order'));
        if ($order > 0) {
            $order_by = 'date asc';
        }
        $this->_data['order'] = $order;
        $this->_data['apps'] = $this->m_App->getAppSelectList('app_id,app_title', 100);

        $config = $this->config->item('pagination');
        if (isset($this->_site['pagesize']) && $this->_site['pagesize'] >= 10 && $this->_site['pagesize'] <= 100) {
            $config['per_page'] = $this->_site['pagesize'];
        }
        $limit = $config['per_page'];
        $offset = ($page - 1) * $limit;
        $list = $this->m_Counter->getCounterList($where, $limit, $offset, $order_by);
        foreach($list as &$v){
            if($v['app_id'] > 0) {
                $app = $this->m_App->getAppInfoById($v['app_id'], 'app_title');
                $v['app_title'] = $app['app_title'];
            }else{
                $v['app_title'] = '手机助手';
            }
        }
        $this->_data['list'] = $list;
        $this->_data['count'] = $this->m_Counter->getCounterCount($where);
        $this->_data['limit'] = $limit;
        $config['base_url'] = build_url('counter','main', array('start'=>$start, 'stop'=>$stop,'app_id'=>$app_id));
        $config['total_rows'] = $this->_data['count'];
        $this->pagination->initialize($config);

        $this->loadView('/Counter/index');
    }
}