<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 导航管理
 * Class Navicat
 */
class Navicat extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_Navicat');
    }

    /**
     * 导航管理首页
     */
    public function main()
    {
        $page = intval($this->input->get('page'));
        if ($page < 1) {
            $page = 1;
        }
        $where = array();
        $count = $this->m_Navicat->getNavicatCount($where);

        $config = $this->config->item('pagination');
        $config['base_url']   = build_url('navicat');
        $config['total_rows'] = $count;
        $this->pagination->initialize($config);

        $limit  = $config['per_page'];
        $offset = ($page - 1) * $config['per_page'];
        $list = $this->m_Navicat->getNavicatList($where, $limit, $offset);

        $this->_data['count']  = $count;
        $this->_data['limit']  = $limit;
        $this->_data['offset'] = $offset;
        $this->_data['list']   = $list;

        $this->loadView('/Navicat/index');
    }

    /**
     * 导航管理
     */
    public function content()
    {
        $info = array();
        $navicat_id = intval($this->input->get('navicat_id'));
        if ($navicat_id > 0) {
            $info = $this->m_Navicat->getNavicatById($navicat_id);
        }
        $this->_data['info'] = $info;
        $this->loadView('/Navicat/content');
    }

    /**
     * 保存
     */
    public function save()
    {
        $navicat_id  = intval($this->input->get('navicat_id'));

        $navicat_name       = $this->input->post('navicat_name', true);
        $navicat_url        = $this->input->post('navicat_url', true);
        $navicat_seotitle   = $this->input->post('navicat_seotitle', true);
        $navicat_seokey     = $this->input->post('navicat_seokey', true);
        $navicat_seodesc    = $this->input->post('navicat_seodesc', true);
        $navicat_enabled    = intval($this->input->post('navicat_enabled'));
        $navicat_order      = intval($this->input->post('navicat_order'));
        $navicat_blank      = intval($this->input->post('navicat_blank'));

        if ($navicat_id > 0) {
            $info = $this->m_Navicat->getNavicatById($navicat_id);
            if (!is_array($info) || sizeof($info) < 1) {
                $this->output->error_json(100, '没有此导航');
            }
            $data = array();
            if ($navicat_name) {
                $data['navicat_name']       = $navicat_name;
            }
            if ($navicat_url) {
                $data['navicat_url']        = $navicat_url;
            }
            if ($navicat_seotitle) {
                $data['navicat_seotitle']   = $navicat_seotitle;
            }
            if ($navicat_seokey) {
                $data['navicat_seokey']     = $navicat_seokey;
            }
            if ($navicat_seodesc) {
                $data['navicat_seodesc']    = $navicat_seodesc;
            }
            if ($navicat_enabled) {
                $data['navicat_enabled']    = $navicat_enabled;
            }
            if ($navicat_order) {
                $data['navicat_order']      = $navicat_order;
            }
            if ($navicat_blank) {
                $data['navicat_blank']      = $navicat_blank;
            }
            $data['navicat_time']           = time();
            $data['uid']                    = $this->_uid;
            if (stripos($navicat_url, 'http://') === 0 || strpos($navicat_url, 'https://') === 0) {
                $data['navicat_m'] = $navicat_url;
            }
            $result = $this->m_Navicat->updateNavicatById($data, $navicat_id);
            if ($result) {
                $this->operate_log('Navicat','update','修改了导航：'.$navicat_name);
                $this->output->ok_json("更新导航成功");
            }
            $this->operate_log('Navicat','update','修改导航失败：'.$navicat_name);
            $this->output->error_json(100, "编辑导航失败");
        }

        $insert = array(
            'navicat_name'      => $navicat_name,
            'navicat_url'       => $navicat_url,
            'navicat_m'         => '',
            'navicat_seotitle'  => $navicat_seotitle,
            'navicat_seokey'    => $navicat_seokey,
            'navicat_seodesc'   => $navicat_seodesc,
            'navicat_enabled'   => $navicat_enabled,
            'navicat_order'     => $navicat_order,
            'navicat_blank'     => $navicat_blank,
            'navicat_time'      => time(),
            'uid'               => $this->_uid
        );
        if (stripos($navicat_url, 'http://') === 0 || strpos($navicat_url, 'https://') === 0) {
            $insert['navicat_m'] = $navicat_url;
        }
        $result = $this->m_Navicat->createNavicat($insert);
        if ($result) {
            $this->operate_log('Navicat','insert','添加了导航：'.$navicat_name);
            $this->output->ok_json("添加导航成功");
        }
        $this->operate_log('Navicat','insert','添加导航失败：'.$navicat_name);
        $this->output->error_json(100, "添加导航失败");
    }

    /**
     * 删除
     */
    public function delete()
    {
        $navicat_id = intval($this->input->post('navicat_id'));
        if ($navicat_id < 1) {
            $this->output->error_json(100, "请输入导航ID");
        }
        $info = $this->m_Navicat->getNavicatById($navicat_id);
        if (!is_array($info) || sizeof($info) < 1) {
            $this->output->error_json(100, "没有此导航");
        }
        $this->m_Navicat->deleteNavicatById($navicat_id);
        //操作日志
        $this->operate_log('Navicat','delete','删除了导航：'.$info['navicat_name']);
        $this->output->ok_json("导航删除成功");
    }

}
