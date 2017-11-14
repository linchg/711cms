<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Special
 * 专题管理
 */
class Special extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_Special');
    }

    /**
     * 专题管理主页
     */
    public function main()
    {
        $page = intval($this->input->get('page'));
        if ($page < 1) {
            $page = 1;
        }
        $where = array();

        $type = $this->input->get('type');
        if ($type) {
            $where['area_type'] = $type;
        }
        $this->_data['type'] = $type;
        $search_type = $this->input->get('search_type');
        $search_txt  = $this->input->get('search_txt');
        if ($search_type && $search_txt) {
            if ($search_txt == 'area_type') {
                $where[$search_type] = $search_txt;
            } else {
                $where[$search_type] = $search_txt; //like
            }
        }
        $this->_data['search_type'] = $search_type;
        $this->_data['search_txt']  = $search_txt;

        $area_id = intval($this->input->post('area_id'));
        if ($area_id > 0){
            $where['area_id'] = $area_id;
        }
        $this->_data['area_id'] = $area_id;

        $count = $this->m_Special->getSpecialCount($where);
        $config = $this->config->item('pagination');
        $config['base_url']   = build_url('special');
        $config['total_rows'] = $count;
        $this->pagination->initialize($config);

        $limit  = $config['per_page'];
        $offset = ($page - 1) * $config['per_page'];
        $list = $this->m_Special->getSpecialList($where, $limit, $offset);

        $this->_data['count']  = $count;
        $this->_data['limit']  = $limit;
        $this->_data['offset'] = $offset;
        $this->_data['list']   = $list;

        $this->loadView("/Special/index");
    }

    /**
     * 某个专题
     */
    public function content()
    {
        $info = array();
        $area_id = intval($this->input->get('area_id'));
        if ($area_id > 0) {
            $info = $this->m_Special->getSpecialInfoById($area_id);
        }
        $this->_data['info'] = $info;
        $this->_data['time'] = time();
        $this->_data['token'] = $this->getUploadToken($this->_data['time']);

        $this->loadView('/Special/content');
    }

    /**
     * 保存
     */
    public function save()
    {
        $area_id = intval($this->input->get('area_id'));

        $area_title     = $this->input->post('area_title', true);
        $area_html      = $this->input->post('area_html', true);
        $area_remarks   = $this->input->post('area_remarks', true);
        $area_logo      = $this->input->post('area_logo', true);
        $area_order     = intval($this->input->post('area_order'));
        $area_ids       = $this->input->post('area_ids', true);
        $special_seotitle   = $this->input->post('special_seotitle', true);
        $special_seokey     = $this->input->post('special_seokey', true);
        $special_seodesc    = $this->input->post('special_seodesc', true);

        if (empty($area_title)) {
            $this->output->error_json(100, "标题不能为空");
        }

        if ($area_id > 0) {
            $info = $this->m_Special->getSpecialInfoById($area_id);
            if (!is_array($info) || sizeof($info) < 1) {
                $this->output->error_json(300, "没有此专题");
            }
            $data = array();
            if ($area_title) {
                $data['area_title']     = $area_title;
            }
            if ($area_html) {
                $data['area_html']      = $area_html;
            }
            if ($area_remarks) {
                $data['area_remarks']   = $area_remarks;
            }
            if ($area_logo) {
                $data['area_logo']      = $area_logo;
            }
            if ($area_order) {
                $data['area_order']     = $area_order;
            }
            if ($area_ids) {
                $data['area_ids']       = $area_ids;
            }
            if ($special_seotitle) {
                $data['special_seotitle']   = $special_seotitle;
            }
            if ($special_seokey) {
                $data['special_seokey']     = $special_seokey;
            }
            if ($special_seodesc) {
                $data['special_seodesc']    = $special_seodesc;
            }
            $data['special_time']           = time();
            $data['uid']                    = $this->_uid;
            $result = $this->m_Special->updateSpecialById($data, $area_id);
            if ($result) {
                $this->operate_log('Special','update','修改了专题：'.$area_title);
                $this->output->ok_json("修改专题成功");
            }
            $this->operate_log('Special','update','修改专题失败：'.$area_title);
            $this->output->error_json(200, "修改专题失败");
        }

        $data = array(
            "area_title"    => $area_title,
            'area_html'     => $area_html,
            'area_remarks'  => $area_remarks,
            'area_logo'     => $area_logo,
            'area_order'    => $area_order,
            'area_ids'      => $area_ids,
            'special_seotitle'  => $special_seotitle,
            'special_seokey'    => $special_seokey,
            'special_seodesc'   => $special_seodesc,
            'special_time'      => time(),
            'uid'               => $this->_uid
        );
        $result = $this->m_Special->createSpecial($data);
        if ($result) {
            $this->operate_log('Special','insert','添加了专题：'.$area_title);
            $this->output->ok_json("添加专题成功");
        }
        $this->operate_log('Special','insert','添加专题失败：'.$area_title);
        $this->output->error_json(200, "添加专题失败, 请核对后重新添加");

    }

    /**
     * 删除
     */
    public function delete()
    {
        $area_id = intval($this->input->post("area_id"));
        if ($area_id < 1) {
            $this->output->error_json(100, "请输入专题ID");
        }
        $info = $this->m_Special->getSpecialInfoById($area_id);
        if (!is_array($info) || sizeof($info) < 1) {
            $this->output->error_json(100, "没有此专题");
        }
        $this->m_Special->deleteSpecialById($area_id);
        $this->operate_log('Special','delete','删除了专题：'.$info['area_title']);
        $this->output->ok_json('删除专题成功');
    }

}
