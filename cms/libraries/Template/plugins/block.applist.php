<?php

function smarty_block_applist($params, $content, $template, &$repeat)
{
    $cid    = isset($params['id'])     ? intval($params['id'])      : 0;
    $parent = isset($params['parent']) ? intval($params['parent'])  : 0;
    $num    = isset($params['row'])    ? intval($params['row'])     : 10;
    $start  = isset($params['start'])  ? intval($params['start'])   : 1;
    $start  = $start - 1;
    $order  = isset($params['order'])  ? $params['order'] : 'app.app_update_time desc';
    $search  = isset($params['search'])  ? $params['search'] : '';
    $page = isset($params['page']) ? intval($params['page']) : 0;
    $per_page = isset($params['per_page']) ? intval($params['per_page']) : 0;
    $start2 = isset($params['start2']) ? intval($params['start2']) : 0;

    if (!$content) {
        $where = array();
        if ($cid > 0) {
            $where['app.last_cate_id'] = $cid;
        }
        if ($parent > 0) {
            $where['app_category.parent_id'] = $parent;
        }

        $ci = get_instance();
        if(!$per_page){
            $name = !empty($ci->_site['template']) ? $ci->_site['template'] : '';
            $config = $ci->m_setting->getTemplateConfig($name);
            $config = $config['pagination'];
            $per_page =(isset($config['per_page']) && $config['per_page'] > 0 ) ? $config['per_page'] : 15;
        }
        if (isset($params['page'])) {
            if ($page < 1) {
                $page = 1;
            }
            $num = $per_page;
            $start = ($page - 1) * $per_page;
        }
        if(isset($params['start2']) ){
            if ($page < 1) {
                $page = 1;
            }
            $num = $per_page;
            $start = ($page - 1) * $per_page + $start2;
        }
        if (!empty($search)) {
            $list = $ci->db->select('*')->from('app')->join('app_category', 'app.last_cate_id = app_category.cate_id')
                ->where($where)->like('app_title', $search)->order_by($order)->limit($num, $start)->get()->result_array();
            if (is_array($list) && sizeof($list) > 0) {
                $search_info = $ci->db->select('*')->from('search')->where(array('q' => $search))->get()->row_array();
                if (is_array($search_info) && sizeof($search_info) > 0) {
                    $ci->db->set('qnum', 'qnum+1', false)->where(array('q' => $search))->update('search');
                } else {
                    $ci->db->insert('search', array('q' => $search, 'qnum' => 1, 'qorder' => 0));
                }
            }
        } else {
            $list = $ci->db->select('*')->from('app')->join('app_category', 'app.last_cate_id = app_category.cate_id')->where($where)->order_by($order)->limit($num, $start)->get()->result_array();
        }

        if (is_array($list) && sizeof($list) > 0) {
            foreach ($list as &$app) {
                $local = $ci->db->select('*')->from('image_local')->where(array('app_id'=>$app['app_id']))->get()->row_array();
                if(is_array($local)&&sizeof($local)>0){ 
                    $app['app_logo'] = '/uploads/local/'.$local['date'].'/'.$app['app_id'].'/'.basename($app['app_logo']);   
                }
                $history = $ci->db->select('*')->from('history')->where(array('app_id' => $app['app_id']))->order_by('history_update_time desc')->limit(1)->get()->row_array();
                if (is_array($history) && sizeof($history) > 0) {
                    $app = array_merge($app, $history);
                }
            }
        }

        $template->block_data['applist'] = $list;
    }

    if (isset($template->block_data['applist']) && sizeof($template->block_data['applist']) > 0) {
        $applist = array_shift($template->block_data['applist']);
        $template->assign(array('applist' => $applist));
        if (sizeof($template->block_data['applist']) < 1) {
            unset($template->block_data['applist']);
            $repeat = false;
        }
        $repeat = true;
    } else {
        $repeat = false;
    }

    return $content;
}
