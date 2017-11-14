<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 广告管理
 * Class Advert
 */
class Advert extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_Advert');
    }

    /**
     * 广告管理主页
     */
    public function main()
    {
        $types = array(1 => 'PC端首页轮播', 2 => 'WAP端首页轮播', 3 => '手助首页轮播');
        $this->_data['types'] = $types;

        $page = intval($this->input->get('page'));
        if ($page < 1) {
            $page = 1;
        }
        $type = intval($this->input->get('type'));
        $where = array();
        if($type && array_key_exists($type, $types))
            $where['ad_type'] = $type;

        $count = $this->m_Advert->getAdCount($where);
        $config = $this->config->item('pagination');
        $config['base_url']   = build_url('ad');
        $config['total_rows'] = $count;
        $this->pagination->initialize($config);

        $limit  = $config['per_page'];
        $offset = ($page - 1) * $config['per_page'];
        $list = $this->m_Advert->getAdList($where, $limit, $offset);

        $this->_data['count']  = $count;
        $this->_data['limit']  = $limit;
        $this->_data['offset'] = $offset;
        $this->_data['list']   = $list;

        $this->loadView("/Advert/index");
    }

    /**
     * 广告内容
     */
    public function content()
    {
        $info = array();
        $ad_id = intval($this->input->get('ad_id'));
        if ($ad_id > 0) {
            $info = $this->m_Advert->getAdInfoById($ad_id);
            if (is_array($info) && sizeof($info) > 0) {
                $info['ad_alts']    = explode('|', $info['ad_alts']);
                $info['ad_images']  = explode('|', $info['ad_images']);
                $info['ad_links']   = explode('|', $info['ad_links']);
            }
        }
        $this->_data['info'] = $info;
        $this->_data['time'] = time();
        $this->_data['token'] = $this->getUploadToken($this->_data['time']);
        $this->loadView('/Advert/content');
    }

    /**
     * 广告保存
     */
    public function save()
    {
        $ad_id = intval($this->input->get('ad_id'));

        $ad_title     = $this->input->post('ad_title', true);
        $ad_type      = intval($this->input->post('ad_type'));
        $ad_alts      = $this->input->post('ad_alts', true);
        $ad_images    = $this->input->post('ad_images', true);
        $ad_links     = $this->input->post('ad_links', true);
        $ad_remarks   = $this->input->post('ad_remarks', true);

        if (empty($ad_title)) {
            $this->output->error_json(100, "标题不能为空");
        }
        if (!is_array($ad_alts) || !is_array($ad_images) || !is_array($ad_links)) {
            $this->output->error_json(100, "请至少添加一个轮播图");
        }
        if (sizeof($ad_alts) != sizeof($ad_images) || sizeof($ad_alts) != sizeof($ad_links)) {
            $this->output->error_json(100, "请轮播图的信息不完整");
        }

        if ($ad_id > 0) {
            $info = $this->m_Advert->getAdInfoById($ad_id);
            if (!is_array($info) || sizeof($info) < 1) {
                $this->output->error_json(300, "没有此广告位");
            }
            $data = array();
            if ($ad_title) {
                $data['ad_title'] = $ad_title;
            }
            if ($ad_type) {
                $data['ad_type'] = $ad_type;
            }
            if ($ad_remarks) {
                $data['ad_remarks'] = $ad_remarks;
            }
            $data['ad_alts']    = implode('|', $ad_alts);
            $data['ad_images']  = implode('|', $ad_images);
            $data['ad_links']   = implode('|', $ad_links);

            $result = $this->m_Advert->updateAdById($data, $ad_id);
            if ($result) {
                $this->operate_log('Advert','update','修改了广告：'.$ad_title);
                $this->output->ok_json("修改广告成功");
            }
            $this->operate_log('Advert','update','修改广告失败:'.$ad_title);
            $this->output->error_json(200, "修改广告失败");
        }


        $data = array(
            "ad_title"      => $ad_title,
            'ad_type'       => $ad_type,
            'ad_alts'       => implode('|', $ad_alts),
            'ad_images'     => implode('|', $ad_images),
            'ad_links'      => implode('|', $ad_links),
            'ad_remarks'    => $ad_remarks,
            'ad_time'       => time(),
            'uid'           => $this->_uid,
        );
        $result = $this->m_Advert->createAd($data);
        if ($result) {
            $this->operate_log('Advert','insert','添加了广告');
            $this->output->ok_json("添加广告成功");
        }
        $this->output->error_json(200, "添加广告失败, 请核对后重新添加");

    }

    /**
     * 广告删除
     */
    public function del()
    {
        $ad_id = intval($this->input->post("ad_id"));
        if ($ad_id < 1) {
            $this->output->error_json(100, "请输入广告ID");
        }
        $info = $this->m_Advert->getAdInfoById($ad_id);
        if (!is_array($info) || sizeof($info) < 1) {
            $this->output->error_json(100, "没有此广告");
        }
        $this->m_Advert->deleteAdById($ad_id);
        $this->operate_log('Advert','delete','删除了广告');
        $this->output->ok_json('删除广告成功');
    }
}
