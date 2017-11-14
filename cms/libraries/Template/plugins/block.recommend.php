<?php
function smarty_block_recommend($params, $content, $template, &$repeat)
{
    $area_id = isset($params['id'])     ? intval($params['id'])     : 16;
    $row     = isset($params['row'])    ? intval($params['row'])    : 20;
    $start   = isset($params['start'])  ? intval($params['start'])  : 0;
    $page = isset($params['page']) ? intval($params['page']) : 0;              //第几页
    $per_page = isset($params['per_page']) ? intval($params['per_page']) : 10; //一页多少个
    if (isset($params['page'])) {
        if ($page < 1) {
            $page = 1;
        }
        $row = $per_page;
        $start = ($page - 1) * $per_page;
    }

    if (!$content) {
        $ci = &get_instance();
        $info = $ci->db->select('*')->from('recommend')->where(array('area_id' => $area_id))->get()->row_array();
        if (is_array($info) && sizeof($info) > 0 && $info['operate_type']==1 ) {
            $ids = explode(',', $info['area_ids']);
            if (is_array($ids) && sizeof($ids) > 0) {
                if ($row > 0 && sizeof($ids)-$start > 0) {
                    $ids = array_slice($ids, $start, $row);
                }
                $list = array();
                $i = 1;
                foreach ($ids as $id) {
                    $app      = $ci->db->select('*')->from('app')->where(array('app_id' => $id))->get()->row_array();
                    if (!is_array($app) || sizeof($app) < 1) {
                        continue;
                    }
                    $local = $ci->db->select('*')->from('image_local')->where(array('app_id' => $id))->get()->row_array();
                    if(is_array($local)&&sizeof($local)>0){ 
                        $app['app_logo'] = '/uploads/local/'.$local['date'].'/'.$id.'/'.basename($app['app_logo']);   
                    }
                    $app['app_sort_show'] = $i++;
                    $history  = $ci->db->select('*')->from('history')->where(array('app_id' => $id))->order_by('history_update_time desc')->limit(1)->get()->row_array();
                    $category = $ci->db->select('*')->from('app_category')->where(array('cate_id' => $app['last_cate_id']))->get()->row_array();
                    if (is_array($app) && sizeof($app) > 0 && is_array($history) && sizeof($history) > 0 && is_array($category) && sizeof($category) > 0) {
                        $list[] = array_merge($app, $history, $category, $info);
                    }
                }
                $template->block_data['recommend'] = $list;
            }
        }elseif(is_array($info) && sizeof($info) > 0 && $info['operate_type']==2){
            $autowhere = array(
                'app_id >' => 0
            );
            if($info['cate_id']>0){
                $autowhere['last_cate_id'] = $info['cate_id'];
            }
            $order_by = 'app_update_time desc';//$info['auto_order'] == 1 默认
            if($info['auto_order'] == 2){
                $order_by = 'app_down desc';
            }
            $obj = $ci->db->select("*")->from('app')->where($autowhere);
            if ($row > 0)
            {
                $obj = $obj->limit($row, $start);
            }
            if (isset($order_by))
            {
                $obj = $obj->order_by($order_by);
            }
            $app_list = $obj->get()->result_array();
            $i = 1;
            if(is_array($app_list) && sizeof($app_list) > 0){
                foreach($app_list as $k=>$v){
                    $history  = $ci->db->select('*')->from('history')->where(array('app_id' => $v['app_id']))->order_by('history_update_time desc')->limit(1)->get()->row_array();
                    $category = $ci->db->select('*')->from('app_category')->where(array('cate_id' => $v['last_cate_id']))->get()->row_array();
                    if (is_array($v) && sizeof($v) > 0 && is_array($history) && sizeof($history) > 0 && is_array($category) && sizeof($category) > 0) {
                        $app_list[$k] = array_merge($v, $history, $category, $info);
                        $app_list[$k]['app_sort_show'] = $i++;
                    }
                }
            }
            $template->block_data['recommend'] = $app_list;
        }
    }

    if (isset($template->block_data['recommend']) && is_array($template->block_data['recommend']) && sizeof($template->block_data['recommend']) > 0) {
        $recommend = array_shift($template->block_data['recommend']);
        $template->assign(array('recommend' => $recommend));
        if (sizeof($template->block_data['recommend']) < 1) {
            unset($template->block_data['recommend']);
            $repeat = false;
        }
        $repeat = true;
    } else {
        $repeat = false;
    }
    return $content;
}
