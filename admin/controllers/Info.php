<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 资讯管理
 * Class Info
 */
class Info extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_InfoCategory');
        $this->load->model('m_Info');
    }

    /**
     * 文章管理主页
     */
    public function main()
    {
        $page = intval($this->input->get('page'));
        if ($page < 1) {
            $page = 1;
        }

        $where = array();

        $last_cate_id = intval($this->input->get('last_cate_id'));
        $search_type = $this->input->get('search_type', true);
        $search_txt  = $this->input->get('search_txt', true);
        if ($search_type == 'info_id' && $search_txt > 0) {
            $where['info_id'] = trim($search_txt);
        }
        if ($search_type == 'info_title' && !empty($search_txt)) {
            $where["info_title like"] = '%' . trim($search_txt) . '%';
        }
        if ($last_cate_id > 0) {
            $where['last_cate_id'] = $last_cate_id;
        }
        $this->_data['last_cate_id'] = $last_cate_id;
        $this->_data['search_type']  = $search_type;
        $this->_data['search_txt']   = $search_txt;

        $info_id = intval($this->input->post('info_id'));
        if ($info_id > 0) {
            $where['info_id'] = $info_id;
        }
        $this->_data['info_id'] = $info_id;

        $count = $this->m_Info->getInfoCount($where);
        $config = $this->config->item('pagination');
        $config['base_url']   = build_url('info');
        $config['total_rows'] = $count;
        $this->pagination->initialize($config);

        $category = $this->m_InfoCategory->getCategoryAll();
        $cates = array();
        if (is_array($category) && sizeof($category) > 0) {
            foreach ($category as $value) {
                $cates[$value['cate_id']] = $value['cname'];
            }
        }
        $this->_data['cates'] = $cates;
        $this->_data['category'] = $category;

        $limit  = $config['per_page'];
        $offset = ($page - 1) * $config['per_page'];
        $list = $this->m_Info->getInfoList($where, $limit, $offset);

        $this->_data['count']  = $count;
        $this->_data['limit']  = $limit;
        $this->_data['offset'] = $offset;
        $this->_data['list']   = $list;

        $this->loadView('/Info/index');
    }

    /**
     * 文章内容
     */
    public function content()
    {
        $info_id = intval($this->input->get('info_id'));
        $info = array();
        if ($info_id > 0) {
            $info = $this->m_Info->getInfoById($info_id);
        }
        $this->_data['info'] = $info;

        $category = $this->m_InfoCategory->getCategoryAll(array('parent_id >' => 0));
        $this->_data['category'] = $category;
        $this->_data['time'] = time();
        $this->_data['token'] = $this->getUploadToken($this->_data['time']);

        $this->loadView('/Info/content');
    }

    /**
     * 保存
     */
    public function save()
    {
        $info_id = intval($this->input->get('info_id'));
        $last_cate_id       = intval($this->input->post('last_cate_id'));
        $info_title         = $this->input->post('info_title', true);
        $info_stitle        = $this->input->post('info_stitle', true);
        $info_img           = $this->input->post('info_img', true);
        $info_desc          = $this->input->post('info_desc', true);
        $info_body          = $this->input->post('info_body');
        $info_tags          = $this->input->post('info_tags', true);
        $info_from          = $this->input->post('info_from', true);
        $info_comments      = intval($this->input->post('info_comments'));
        $info_visitors      = intval($this->input->post('info_visitors'));
        $info_order         = intval($this->input->post('info_order'));
        $info_url           = $this->input->post('info_url', true);
        $info_publish_time  = $this->input->post('info_publish_time', true);
        $info_seodesc       = $this->input->post('info_seodesc', true);
        $info_seokey        = $this->input->post('info_seokey', true);
        $info_status        = intval($this->input->post('info_status'));
        $info_author        = $this->input->post('info_author', true);
        $create_time        = time();

        if ($info_publish_time) {
            $info_publish_time = strtotime($info_publish_time);
            if ($info_publish_time < time()) {
                $this->output->error_json(100, "定时发布时间不可小于当前时间");
            }
        }
        if (empty($info_publish_time)) {
            $info_publish_time = 0;
        }

        if ($last_cate_id < 1) {
            $this->output->error_json(100, "请选择文章的分类");
        }

        if(empty($info_img)){
            $info_img = $this->catch_that_image($info_body);
        }
        
        if ($info_id > 0) {
            $info = $this->m_Info->getInfoById($info_id);
            if (!is_array($info) || sizeof($info) < 1) {
                $this->output->error_json(100, '没有此文章');
            }
            $data = array();
            if ($last_cate_id) {
                $data['last_cate_id']       = $last_cate_id;
            }
            if ($info_title) {
                $data['info_title']         = $info_title;
            }
            if ($info_stitle) {
                $data['info_stitle']        = $info_stitle;
            }
            if ($info_img) {
                $data['info_img']           = $info_img;
            }
            if ($info_desc) {
                $data['info_desc']          = $info_desc;
            }
            if ($info_body) {
                $data['info_body']          = $info_body;
            }
            if ($info_tags) {
                $data['info_tags']          = $info_tags;
            }
            if ($info_from) {
                $data['info_from']          = $info_from;
            }
            if ($info_comments) {
                $data['info_comments']      = $info_comments;
            }
            if ($info_visitors) {
                $data['info_visitors']      = $info_visitors;
            }
            if ($info_order) {
                $data['info_order']         = $info_order;
            }
            if ($info_url) {
                $data['info_url']           = $info_url;
            }
            if ($info_publish_time) {
                $data['info_publish_time']  = $info_publish_time;
            }
            if(!$info_publish_time){
                $data['info_publish_time']  = 0;
            }
            if ($info_seodesc) {
                $data['info_seodesc']       = $info_seodesc;
            }
            if ($info_seokey) {
                $data['info_seokey']        = $info_seokey;
            }

            if ($info_status) {
                $data['info_status']        =  $info_status;
            }
            if ($info_author) {
                $data['info_author']        = $info_author;
            }
            $data['info_update_time']       = time();
            $data['uid']                    = $this->_uid;

            $result = $this->m_Info->updateInfoById($data, $info_id);
            if ($result) {
                $this->operate_log('Info','update','修改了文章：'.$info_title);
                $this->output->ok_json("更新文章成功");
            }
            $this->operate_log('Info','update','修改文章失败：'.$info_title);
            $this->output->error_json(100, "编辑文章失败");
        }

        $info_id = $this->m_Info->createInfo(array(
            'last_cate_id'       => $last_cate_id,
            'info_title'         => $info_title,
            'info_stitle'        => $info_stitle,
            'info_img'           => $info_img,
            'info_desc'          => $info_desc,
            'info_body'          => $info_body,
            'info_tags'          => $info_tags,
            'info_from'          => $info_from,
            'info_comments'      => $info_comments,
            'info_visitors'      => $info_visitors,
            'info_order'         => $info_order,
            'info_url'           => $info_url,
            'info_publish_time'  => $info_publish_time,
            'info_seodesc'       => $info_seodesc,
            'info_seokey'        => $info_seokey,
            'info_update_time'   => time(),
            'create_time'        => time(),
            'uid'                => $this->_uid,
            'info_status'        => $info_status, // $info_publish_time > 0 ? 2 :
            'info_author'        => $info_author,
        ));

        if ($info_id) {
            $this->operate_log('Info','insert','添加了文章：'.$info_title);
            $this->output->ok_json("添加文章成功");
        }
        $this->operate_log('Info','insert','添加文章失败：'.$info_title);
        $this->output->error_json(100, "添加文章失败");
    }

    /**
     * 删除
     */
    public function delete()
    {
        $info_id = intval($this->input->post('info_id'));
        if ($info_id < 1) {
            $this->output->error_json(100, "请输入文章ID");
        }
        $info = $this->m_Info->getInfoById($info_id);
        if (!is_array($info) || sizeof($info) < 1) {
            $this->output->error_json(100, "没有此文章");
        }
        $this->m_Info->deleteInfoById($info_id);
        $this->operate_log('Info','delete','删除了文章：'.$info['info_title']);
        $this->output->ok_json("文章删除成功");
    }

    /**
     * 删除全部文章，慎用
     */
    public function delete_all()
    {
        $list = $this->m_Info->getInfoAll();
        if (is_array($list) && sizeof($list) > 0) {
            foreach ($list as $key => $value) {
                $this->m_Info->deleteInfoById($value['info_id']);
            }
            $this->operate_log('Info','delete','删除了全部文章');
            $this->output->ok_json();
        }else{
            $this->output->error_json(100, "没有可以删除的文章");
        }   
    }

    /**
     * 分析文章图片
     * @param $content
     * @return string
     */
    protected function catch_that_image($content) {
        ob_start();
        ob_end_clean();
        $output = preg_match( "<img.*src=[\"](.*?)[\"].*?>", $content, $matches);
        if($output){
            $first_img = $matches [1];
        }else{
            $first_img = '/uploads/images/zhanwu.jpg';
        }
        return $first_img;
    }
}
