<?php
function smarty_block_necessary($params, $content, $template, &$repeat)
{
    $necessary_id   = isset($params['id'])      ? intval($params['id'])     : 15;
    $row            = isset($params['row'])     ? intval($params['row'])    : 10;
    $start          = isset($params['start'])   ? intval($params['start'])  : 0;
    $page = isset($params['page']) ? intval($params['page']) : 0;              //第几页
    $per_page = isset($params['per_page']) ? intval($params['per_page']) : 15; //一页多少个
    if (isset($params['page'])) {
        if ($page < 1) {
            $page = 1;
        }
        $row = $per_page;
        $start = ($page - 1) * $per_page;
    }

    if (!$content) {
        $ci = &get_instance();
        $info = $ci->db->select('*')->from('necessary')->where(array('necessary_id' => $necessary_id))->limit(0, 0)->get()->row_array();//type
        if (is_array($info) && sizeof($info) > 0) {
            $ids = explode(',', $info['necessary_list']);
            if (is_array($ids) && sizeof($ids) > 0) {
                if ($row > 0 && sizeof($ids) > $row) {
                    $ids = array_slice($ids, $start, $row);
                }
                $list = array();
                foreach ($ids as $id) {
                    $app     = $ci->db->select('*')->from('app')->where(array('app_id' => $id))->get()->row_array();
                    $local = $ci->db->select('*')->from('image_local')->where(array('app_id' => $id))->get()->row_array();
                    if(is_array($local)&&sizeof($local)>0){ 
                        $app['app_logo'] = '/uploads/local/'.$local['date'].'/'.$id.'/'.basename($app['app_logo']);   
                    }
                    $history = $ci->db->select('*')->from('history')->where(array('app_id' => $id))->order_by('history_update_time desc')->limit(1)->get()->row_array();
                    if (is_array($app) && sizeof($app) > 0 && is_array($history) && sizeof($history) > 0) {
                        $list[] = array_merge($app, $history, $info);
                    }
                }
                $template->block_data['necessary'] = $list;
            }
        }
    }

    if (isset($template->block_data['necessary']) && is_array($template->block_data['necessary']) && sizeof($template->block_data['necessary']) > 0) {
        $necessary = array_shift($template->block_data['necessary']);
        $template->assign(array('necessary' => $necessary));
        if (sizeof($template->block_data['necessary']) < 1) {
            unset($template->block_data['necessary']);
            $repeat = false;
        }
        $repeat = true;
    } else {
        $repeat = false;
    }

    return $content;
}
