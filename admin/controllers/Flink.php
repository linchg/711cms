<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 友链管理
 * Class Flink
 */
class Flink extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_Flink');
    }

    public function main()
    {
        $page = intval($this->input->get('page'));
        if ($page < 1) {
            $page = 1;
        }
        $where = array();

        $count = $this->m_Flink->getFlinkCount($where);

        $config = $this->config->item('pagination');
        $config['base_url']   = build_url('flink');
        $config['total_rows'] = $count;
        $this->pagination->initialize($config);

        $limit  = $config['per_page'];
        $offset = ($page - 1) * $config['per_page'];
        $list = $this->m_Flink->getFlinkList($where, $limit, $offset);

        $this->_data['count']  = $count;
        $this->_data['limit']  = $limit;
        $this->_data['offset'] = $offset;
        $this->_data['list']   = $list;

        $this->loadView('/Flink/index');
    }

    public function content()
    {
        $info = array();
        $flink_id = intval($this->input->get('flink_id'));
        if ($flink_id > 0) {
            $info = $this->m_Flink->getFlinkById($flink_id);
        }
        $this->_data['info'] = $info;
        $this->_data['time'] = time();
        $this->_data['token'] = $this->getUploadToken($this->_data['time']);

        $this->loadView('/Flink/content');
    }

    public function save()
    {
        $flink_id    = intval($this->input->get('flink_id'));

        $flink_name  = $this->input->post('flink_name', true);
        $flink_img   = $this->input->post('flink_img', true);
        $flink_url   = $this->input->post('flink_url', true);
        $flink_type  = intval($this->input->post('flink_type'));
        $flink_order = intval($this->input->post('flink_order'));

        if(strpos($flink_url,'http://') !== 0){
            $this->output->error_json(100, '友情链接格式要以‘http://’开头');
        }
        if($flink_url == 'http://'){
            $this->output->error_json(100, '请输入友情链接地址');
        }

        if ($flink_id > 0) {
            $info = $this->m_Flink->getFlinkById($flink_id);
            if (!is_array($info) || sizeof($info) < 1) {
                $this->output->error_json(100, '没有此友情链接');
            }
            $data = array();
            if ($flink_name) {
                $data['flink_name']     = $flink_name;
            }
            if ($flink_img) {
                $data['flink_img']      = $flink_img;
            }
            if ($flink_url) {
                $data['flink_url']      = $flink_url;
            }

            if ($flink_type) {
                $data['flink_type']     = $flink_type;
            }
            if ($flink_order) {
                $data['flink_order']    = $flink_order;
            }
            $data['flink_time']         = time();
            $data['uid']                = $this->_uid;

            $result = $this->m_Flink->updateFlinkById($data, $flink_id);
            if ($result) {
                $this->operate_log('Flink','update','修改了友情链接：'.$flink_name);
                $this->output->ok_json("更新友情链接成功");
            }
            $this->operate_log('Flink','update','修改了友情链接失败：'.$flink_name);
            $this->output->error_json(100, "编辑友情链接失败");
        }

        $result = $this->m_Flink->createFlink(array(
            'flink_name'    => $flink_name,
            'flink_img'     => $flink_img,
            'flink_url'     => $flink_url,
            'flink_type'    => $flink_type,
            'flink_order'   => $flink_order,
            'flink_time'    => time(),
            'uid'           => $this->_uid
        ));
        if ($result) {
            $this->operate_log('Flink','insert','添加了友情链接：'.$flink_name);
            $this->output->ok_json("添加友情链接成功");
        }
        $this->operate_log('Flink','insert','添加了友情链接失败：'.$flink_name);
        $this->output->error_json(100, "添加友情链接失败");
    }

    public function delete()
    {
        $flink_id = intval($this->input->post('flink_id'));
        if ($flink_id < 1) {
            $this->output->error_json(100, "请输入友情链接ID");
        }
        $info = $this->m_Flink->getFlinkById($flink_id);
        if (!is_array($info) || sizeof($info) < 1) {
            $this->output->error_json(100, "没有此友情链接");
        }
        $this->m_Flink->deleteFlinkById($flink_id);
        $this->operate_log('Flink','delete','删除了友情链接：'.$info['flink_name']);
        $this->output->ok_json("友情链接删除成功");
    }
}
