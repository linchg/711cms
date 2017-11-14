<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 推荐管理
 * Class Recommend
 */
class Recommend extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_Recommend');
        $this->load->model('m_App');
        $this->load->model('m_AppCategory');
    }

    /**
     * 推荐管理主页
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
        $this->_data['type'] = $type ? $type : 0 ;
        $search_type = $this->input->get('search_type');
        $search_txt  = $this->input->get('search_txt');
        if ($search_type && $search_txt) {
            $where[$search_type] = $search_txt; //like
        }
        $this->_data['search_type'] = $search_type;
        $this->_data['search_txt']  = $search_txt;

        // 这个是jquery传过来编辑友链时获取数据的
        $area_id = intval($this->input->get_post('area_id'));
        if ($area_id > 0){
            $where['area_id'] = $area_id;
        }
        $this->_data['area_id'] = $area_id;

        $count = $this->m_Recommend->getRecommendCount($where);
        $config = $this->config->item('pagination');
        $config['base_url']   = build_url('recommend','main',array('type'=>$type));
        $config['total_rows'] = $count;
        $this->pagination->initialize($config);

        $limit  = $config['per_page'];
        $offset = ($page - 1) * $config['per_page'];
        $order_by = 'area_type asc,area_order asc';
        $list = $this->m_Recommend->getRecommendList($where, $limit, $offset,$order_by);
        foreach ($list as $key => $value) {
            if(!empty($value['area_ids'])){
                $list[$key]['num'] = substr_count($value['area_ids'],',')+1;   
            }else{
                $list[$key]['num'] = 0;
            }
        }
        $this->_data['count']  = $count;
        $this->_data['limit']  = $limit;
        $this->_data['offset'] = $offset;
        $this->_data['list']   = $list;

        $this->loadView("/Recommend/index");
    }

    /**
     * 具体某个推荐
     */
    public function content()
    {
        $info = array();
        $area_id = intval($this->input->get('area_id'));
        if ($area_id > 0) {
            $info = $this->m_Recommend->getRecommendInfoById($area_id);
            if(sizeof($info)>0&&$info['auto_type']>0){
                $where = array(
                    'parent_id' => $info['auto_type']
                );
                $category = $this->m_AppCategory->getCategoryAll($where);
                $this->_data['category'] = $category;    
            }
        }
        $this->_data['info'] = $info;
        $this->_data['time'] = time();
        $this->_data['token'] = $this->getUploadToken($this->_data['time']);

        $this->loadView('/Recommend/content');
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
        $area_type      = intval($this->input->post('area_type'));
        $operate_type   = intval($this->input->post('operate_type'));
        $auto_type      = intval($this->input->post('auto_type'));
        $cate_id        = intval($this->input->post('cate_id'));
        $auto_order     = intval($this->input->post('auto_order'));

        if (empty($area_title)) {
            $this->output->error_json(100, "标题不能为空");
        }

        if ($area_id > 0) {
            $info = $this->m_Recommend->getRecommendInfoById($area_id);
            if (!is_array($info) || sizeof($info) < 1) {
                $this->output->error_json(300, "没有此推荐位");
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
            if ($area_ids || empty($area_ids)) {
                $data['area_ids']       = $area_ids;
            }
            if ($area_type) {
                $data['area_type']      = $area_type;
            }
            if($operate_type){
                $data['operate_type']   = $operate_type;
            }
            if($auto_type){
                $data['auto_type']      = $auto_type;
            }
            if($cate_id){
                $data['cate_id']      = $cate_id;
            }
            if($auto_order){
                $data['auto_order']   = $auto_order;
            }
            $result = $this->m_Recommend->updateRecommendById($data, $area_id);
            if ($result) {
                $this->operate_log('Recommend','update','修改了推荐位：'.$area_title);
                $this->output->ok_json("修改推荐位成功");
            }
            $this->operate_log('Recommend','update','修改推荐位失败：'.$area_title);
            $this->output->error_json(200, "修改推荐位失败");
        }

        $data = array(
            "area_title"    => $area_title,
            'area_html'     => $area_html,
            'area_remarks'  => $area_remarks,
            'area_logo'     => $area_logo,
            'area_order'    => $area_order,
            'area_ids'      => $area_ids,
            'area_type'     => $area_type,
            'operate_type'  => $operate_type,
            'auto_type'     => $auto_type,
            'cate_id'       => $cate_id,
            'auto_order'    => $auto_order,
        );
        $result = $this->m_Recommend->createRecommend($data);
        if ($result) {
            $this->operate_log('Recommend','insert','添加了推荐位：'.$area_title);
            $this->output->ok_json("添加推荐位成功");
        }
        $this->operate_log('Recommend','insert','添加推荐位失败：'.$area_title);
        $this->output->error_json(200, "添加推荐位失败, 请核对后重新添加");
    }

    /**
     * 删除推荐
     */
    public function delete()
    {
        $area_id = intval($this->input->post("area_id"));
        if ($area_id < 1) {
            $this->output->error_json(100, "请输入推荐位ID");
        }
        $info = $this->m_Recommend->getRecommendInfoById($area_id);
        if (!is_array($info) || sizeof($info) < 1) {
            $this->output->error_json(100, "没有此推荐位");
        }
        if ($info['area_type'] == 2) {
            $this->output->error_json(100, "手助推荐位不可以删除");
        }
        $this->m_Recommend->deleteRecommendById($area_id);
        $this->operate_log('Recommend','delete','删除了推荐位：'.$info['area_title']);
        $this->output->ok_json('删除推荐位成功');
    }

    /**
     * 某个推荐的应用列表
     */
    public function recommended_app_list()
    {
        $area_id = intval($this->input->get('area_id'));
        $this->_data['area_id']  = $area_id;
        if ($area_id > 0) {
            $category = $this->m_AppCategory->getCategoryAll();
            $parents = array();
            if (is_array($category) && sizeof($category) > 0) {
                foreach ($category as $value) {
                    $cates[$value['cate_id']] = $value['cname'];
                    $parents[$value['parent_id']][$value['cate_id']] = $value['cname'];
                }
            }
            $this->_data['cates'] = $cates;
            $this->_data['parents'] = $parents;
            $info = $this->m_Recommend->getRecommendInfoById($area_id);
            if(is_array($info)&&sizeof($info)>0){
                $app_list = null;
                if(!empty($info['area_ids'])){
                    $area_ids = explode(',', $info['area_ids']);
                    foreach ($area_ids as $key => $value) {
                         $appInfo = $this->m_App->getAppInfoById($value);
                         if(is_array($appInfo)&&sizeof($appInfo)>0){
                            $app_list[] = $appInfo;
                         }   
                    }
                }  
                $this->_data['list']  = $app_list; 
            }
        } 
        $this->loadView('/Recommend/list');
    }

    /**
     * 取消某个推荐中的应用
     */
    public function cancel_recommended()
    {
        $app_id = intval($this->input->post('app_id'));
        if ($app_id < 1) {
            $this->output->error_json(100, "请选择要取消推荐的应用");
        }
        $area_id = intval($this->input->post("area_id"));
        if ($area_id < 1) {
            $this->output->error_json(100, "未获取到当前应用所在推荐位信息");
        }
        $info = $this->m_Recommend->getRecommendInfoById($area_id);
        if (!is_array($info) || sizeof($info) < 1) {
            $this->output->error_json(100, "没有此推荐位");
        }
        $area_ids = explode(',', $info['area_ids']);
        $app_ids = array();
        foreach ($area_ids as $key => $value) {
            if($value == $app_id){
                continue;
            }
            $app_ids[$key] = $value;
        }
        $data = array();
        $data['area_ids'] = implode(',', $app_ids);
        $result = $this->m_Recommend->updateRecommendById($data, $area_id);
        if ($result) {   
            $this->output->ok_json("操作成功");
        }
        $this->output->error_json(200, "操作失败");  
    }

}
