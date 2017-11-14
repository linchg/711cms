<?php
function smarty_block_special($params, $content, $template, &$repeat)
{
    $area_id = isset($params['id'])     ? intval($params['id'])     : 16;
    $row     = isset($params['row'])    ? intval($params['row'])    : 0;
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
        $info = $ci->db->select('*')->from('special')->where(array('area_id' => $area_id))->get()->row_array();
        if (is_array($info) && sizeof($info) > 0) {
            $ids = explode(',', $info['area_ids']);
            if (is_array($ids) && sizeof($ids) > 0) {
                if ($row > 0 && sizeof($ids) > $row) {
                    $ids = array_slice($ids, $start, $row);
                }
                $list = array();
                foreach ($ids as $id) {
                    $app      = $ci->db->select('*')->from('app')->where(array('app_id' => $id))->limit(0, 0)->get()->row_array();
                    if (!is_array($app) || sizeof($app) < 1) {
                        continue;
                    }
                    $local = $ci->db->select('*')->from('image_local')->where(array('app_id' => $id))->get()->row_array();
                    if(is_array($local)&&sizeof($local)>0){ 
                        $app['app_logo'] = '/uploads/local/'.$local['date'].'/'.$id.'/'.basename($app['app_logo']);   
                    }
                    $history  = $ci->db->select('*')->from('history')->where(array('app_id' => $id))->order_by('history_update_time desc')->limit(1)->get()->row_array();
                    $category = $ci->db->select('*')->from('app_category')->where(array('cate_id' => $app['last_cate_id']))->get()->row_array();
                    if (is_array($app) && sizeof($app) > 0 && is_array($history) && sizeof($history) > 0) {
                        $list[] = array_merge($app, $history, $info, $category);
                    }
                }
                $template->block_data['special'] = $list;
            }
        }
    }

    if (isset($template->block_data['special']) && is_array($template->block_data['special']) && sizeof($template->block_data['special']) > 0) {
        $special = array_shift($template->block_data['special']);
        $template->assign(array('special' => $special));
        if (sizeof($template->block_data['special']) < 1) {
            unset($template->block_data['special']);
            $repeat = false;
        }
        $repeat = true;
    } else {
        $repeat = false;
    }

    return $content;
}
