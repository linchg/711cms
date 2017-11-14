<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Ajax
 * 网站ajax请求类
 */
class Ajax extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_App','m_app');
        $this->load->model('M_Recommend','m_recommend');
        $this->load->model('M_History','m_history');
        $this->load->model('M_Comment','m_comment');
        $this->load->model('M_AppCategory','m_app_category');
        $this->load->model('M_Advert','m_advert');
        $this->load->model('M_Resource','m_resource');
        $this->load->model('M_Search','m_search');
        $this->load->model('M_Special','m_special');
        $this->load->model('M_Info','m_info');
        $this->load->model('M_Necessary','m_necessary');
    }

    /**
     * 获取更多应用， ajax请求
     */
    public function apps()
    {
        $page_ajax = intval($this->input->post_get('page'));
        $cate_id_ajax = intval($this->input->post_get('last_cate_id'));
        $parent_id = intval($this->input->post_get('parent_id'));
        if($page_ajax){
            $num = 15;
            $start = ($page_ajax - 1) * $num;
            $order = 'app_update_time desc';
            if($cate_id_ajax){
                $where = array(
                    'last_cate_id' => $cate_id_ajax
                );
                $list = $this->m_app->getAppList($where,$num,$start,$order);
            }else{
                $arr_cate = array();
                $list_cate = $this->m_app_category->getCategoryAll(array('parent_id'=>$parent_id));
                foreach($list_cate as $k=>$v){
                    $arr_cate[] = $v['cate_id'];
                }
                $list = $this->m_app->getAppsByWhereIn('last_cate_id',$arr_cate,$num,$start,$order);
            }
            foreach($list as &$l){
                $l['app_url'] = api_site_url('index', 'app', array('app_id' => $l['app_id']));
            }
            $order_by = 'history_update_time desc';
            if (is_array($list) && sizeof($list) > 0) {
                foreach ($list as &$app) {
                    $history = $this->m_history->getHistoryNew( $app['app_id'],$order_by);
                    $category = $this->m_app_category->getCategoryInfoById($app['last_cate_id']);
                    if (is_array($history) && sizeof($history) > 0 && sizeof($category) > 0 &&is_array($category)) {
                        $app = array_merge($app,$category,$history);
                    }
                }
            }
            if($list){
                $data['status'] = 1;
                $data['mes'] = 'success';
                $data['list'] = $list;
                $data['page'] = $page_ajax;
            }else{
                $data['status'] = 0;
                $data['mes'] = 'fail';
                $data['list'] = $list;
                $data['page'] = $page_ajax;
            }
            exit(json_encode($data));
        }
    }

    /**
     * 资讯ajax请求
     */
    public function infos()
    {
        $page_ajax = intval($this->input->post_get('page'));
        $last_cate_id_ajax = intval($this->input->post_get('last_cate_id'));
        if($page_ajax){
            $num = 10;
            $start = ($page_ajax - 1) * $num;
            $order = 'info_order desc, info_update_time desc';
            $where = array('info_publish_time <=' => time());
            if($last_cate_id_ajax){
                $where['last_cate_id'] = $last_cate_id_ajax;
            }
            $list = $this->m_info->getInfoList($where,$num,$start,$order);
            foreach($list as &$l){
                if(!$l['info_url']){
                    $l['info_url'] = api_site_url('index', 'info', array('info_id' => $l['info_id']));
                }
            }

            if($list){
                $data['status'] = 1;
                $data['mes'] = 'success';
                $data['list'] = $list;
            }else{
                $data['status'] = 0;
                $data['mes'] = 'fail';
                $data['list'] = $list;
            }
            exit(json_encode($data));
        }
    }

    /**
     * 获取排序列表的请求
     */
    public function ranks()
    {

        $page_rank=intval($this->input->post_get('page'));
        $id_rank=intval($this->input->post_get('id'));
        if($page_rank){
            $num = 15;
            $start = ($page_rank - 1) * $num;

            $where=array();
            if($id_rank){
                $rank_cate=array();
                $rank=$this->m_recommend->getRecommendAll(array('area_id'=>$id_rank));
                foreach($rank as $k=>$v){
                    $rank_cate[]=$v['area_ids'];
                }
                $list=$this->m_app->getAppsByWhereIn('app_id',$rank_cate,$num,$start);
            }else
                $list=$this->m_app->getAppList($where,$num,$start);

            $order_by = 'history_update_time desc';
            if (is_array($list) && sizeof($list) > 0) {
                foreach ($list as &$app) {
                    $history = $this->m_history->getHistoryNew( $app['app_id'],$order_by);
                    $category = $this->m_app_category->getCategoryInfoById($app['last_cate_id']);
                    if (is_array($history) && sizeof($history) > 0 && sizeof($category) > 0 &&is_array($category)) {
                        $app = array_merge($app,$category,$history);
                    }

                }
            }
            if($list){
                $data['status'] = 1;
                $data['mes'] = '加载成功！';
                $data['list'] = $list;
                $data['page'] = $page_rank;
            }else{
                $data['status'] = 0;
                $data['mes'] = '加载失败！';
                $data['list'] = $list;
                $data['page'] = $page_rank;
            }
            exit(json_encode($data));
        }
    }

    /**
     * 装机必备列表请求
     */
    public function necessaries()
    {
        $page_ajax = intval($this->input->post_get('page'));
        $necessary = intval($this->input->post_get('necessary_type'));

        if ($page_ajax) {
            if ($page_ajax < 1) {
                $page_ajax = 1;
            }
            $num = 15;
            $start = ($page_ajax - 1) * $num;
            $where = array();

            if ($necessary) {
                $arr_cate = array();
                $list_cate = $this->m_necessary->getNecessaryAll(array('necessary_type' => $necessary));

                foreach ($list_cate as $k => $v) {
                    $arr_cate[] = $v['necessary_list'];
                }
                $list=$this->m_app->getAppsByWhereIn('app_id',$arr_cate,$num,$start);
            }else
                $list = $this->m_app->getAppList($where, $num, $start);

            foreach($list as &$l){
                $l['app_url'] = api_site_url('index', 'app', array('app_id' => $l['app_id']));
            }

            $order_by = 'history_update_time desc';
            if (is_array($list) && sizeof($list) > 0) {
                foreach ($list as &$app) {
                    $history = $this->m_history->getHistoryNew($app['app_id'], $order_by);
                    $category = $this->m_app_category->getCategoryInfoById($app['last_cate_id']);
                    if (is_array($history) && sizeof($history) > 0 && sizeof($category) > 0 && is_array($category)) {
                        $app = array_merge($app, $category, $history);
                    }
                }
            }
            if ($list) {
                $data['status'] = 1;
                $data['mes'] = 'success';
                $data['list'] = $list;
                $data['page'] = $page_ajax;

            } else {
                $data['status'] = 0;
                $data['mes'] = 'fail';
                $data['list'] = $list;
                $data['page'] = $page_ajax;
            }
            $this->output->json_out($data);
        }
    }

    /**
     * 专题请求
     */
    public function special()
    {
        $page_ajax = intval($this->input->post_get('page'));
        $special_id = intval($this->input->post_get('special_id'));

        if ($page_ajax) {
            if ($page_ajax < 1) {
                $page_ajax = 1;
            }
            $num = 10;
            $start = ($page_ajax - 1) * $num;
            $where = array();

            if ($special_id) {
                $arr_cate = array();
                $list_cate = $this->m_special->getSpecialAll(array('area_id' => $special_id));
                foreach ($list_cate as $k => $v) {
                    $arr_cate[] = $v['area_ids'];
                }
                $list=$this->m_app->getAppsByWhereIn('app_id',$arr_cate,$num,$start);
            }else
                $list = $this->m_app->getAppList($where, $num, $start);

            foreach($list as &$l){
                $l['app_url'] = api_site_url('index', 'app', array('app_id' => $l['app_id']));
            }
            $order_by = 'history_update_time desc';
            if (is_array($list) && sizeof($list) > 0) {
                foreach ($list as &$app) {
                    $history = $this->m_history->getHistoryNew($app['app_id'], $order_by);
                    $category = $this->m_app_category->getCategoryInfoById($app['last_cate_id']);
                    if (is_array($history) && sizeof($history) > 0 && sizeof($category) > 0 && is_array($category)) {
                        $app = array_merge($app, $category, $history);
                    }

                }
            }
            if ($list) {
                $data['status'] = 1;
                $data['mes'] = 'success';
                $data['list'] = $list;
                $data['page'] = $page_ajax;

            } else {
                $data['status'] = 0;
                $data['mes'] = 'fail';
                $data['list'] = $list;
                $data['page'] = $page_ajax;
            }
            $this->output->json_out($data);
        }
    }

    /**
     * 加载评论请求
     */
    public function commentLoad()
    {
        $info_appid = intval($this->input->post_get('app_id'));
        $page = intval($this->input->post_get('page'));
        if( $page > 0){
            $limit = 5;
            $offset =  $page == 2 ? 6 : 6 + 5*($page -1);
        }else{
            $limit = 15;
            $offset = 0;
        }
        $where = array(
            'info_app_id' => $info_appid,
            'comment_check' => 1
        );

        $comment_list = $this->m_comment->getAppCommentList($where,$limit,$offset);
        if($comment_list){
            $data['status'] = 1;
            $data['mes'] = 'success';
            $data['list'] = $comment_list;
        }else{
            $data['status'] = 0;
            $data['mes'] = 'fail';
            $data['list'] = array();
        }
        $this->output->json_out($data);
    }

    /**
     * 发表评论等请求
     */
    public function comment()
    {
        $app_id = intval($this->input->get('app_id'));
        if ($app_id > 0) {
            $app = $this->m_app->getAppInfoById($app_id);
            if (!is_array($app) || sizeof($app) < 1) {
                $this->output->error_json(100, "没有此应用");
            }
        }

        $info_id = intval($this->input->get('info_id'));
        if ($info_id > 0) {
            $info = $this->m_info->getInfoById($info_id);
            if (!is_array($info) || sizeof($info) < 1) {
                $this->output->error_json(100, "没有此文章");
            }
        }
        $comment = $this->input->post('comment', true);
        if (empty($comment)) {
            $this->output->error_json(100, "请输入评论的内容");
        }

        $user = $this->input->post('user', true);
        if (empty($user)) {
            $this->output->error_json(100, "请输入昵称");
        }

        $xcode = $this->input->post('xcode', true);
        if (!is_string($xcode) || strlen($xcode) != 4) {
            $this->output->error_json(100, "请输入4位的验证码");
        }
        $mycode = $this->session->userdata('xcode');
        if ($xcode != $mycode) {
            $this->output->error_json(100, "验证码不正确!");
        }
        $where_c = array(
            'comment_content' => $comment,
            'comment_uname' => $user
        );
        $list_comment = $this->m_comment->getAppCommentList($where_c,1,0);
        if ($list_comment) {
            $this->output->error_json(100, "不能重复评论");
        }
        if (!$list_comment && $app_id > 0) {
            $this->m_comment->createAppComment(array(
                'info_app_id'       => $app_id,
                'comment_content'   => $comment,
                'comment_date'      => time(),
                'comment_user'      => 0,
                'comment_uname'     => $user,
                'comment_ip'        => $this->input->ip_address(),
                'comment_parent'    => 0,
                'comment_check'     => 1,
                'comment_good'      => 0,
                'comment_bad'       => 0
            ));
            $this->output->ok_json('发表成功');
        } else if ($info_id > 0) {
            $this->m_comment->createInfoComment(array(
                'info_app_id'       => $info_id,
                'comment_content'   => $comment,
                'comment_date'      => time(),
                'comment_user'      => 0,
                'comment_uname'     => $user,
                'comment_ip'        => $this->input->ip_address(),
                'comment_parent'    => 0,
                'comment_check'     => 1,
                'comment_good'      => 0,
                'comment_bad'       => 0
            ));
            $this->output->ok_json('发表成功');
        }
        $this->output->error_json(100,"发表失败");
    }
}