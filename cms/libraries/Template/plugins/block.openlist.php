<?php

function smarty_block_openlist($params, $content, $template, &$repeat)
{
    $cid   = isset($params['p_id'])     ? intval($params['p_id'])      : 0;
    $parent = isset($params['parent']) ? intval($params['parent'])  : 0;
    $num    = isset($params['row'])    ? intval($params['row'])     : 10;
    $start  = isset($params['start'])  ? intval($params['start'])   : 1;
    $start  = $start - 1;
    $order  = isset($params['order'])  ? $params['order'] : 'app_packs.p_id desc';

    $search  = isset($params['search'])  ? $params['search'] : '';
    $page = isset($params['page']) ? intval($params['page']) : 0;
    $per_page = isset($params['per_page']) ? intval($params['per_page']) : 10;


    if (!$content) {

        $ci = get_instance();
        if (isset($params['page'])) {
            if ($page < 1) {
                $page = 1;
            }
            $num = $per_page;
            $start = ($page - 1) * $per_page;
        }

        if ($cid > 0){
            $where = array();
            $where['app_packs.p_type_id'] = $cid;
            $where['p_state'] =2;
            $list = $ci->db->select('*')->from('app_packs')
                ->join('app_service','app_packs.p_app_id = app_service.o_app_id')
                ->like('app_title', $search)->order_by($order)->limit($num, $start)->where($where)->get()->result_array();
            $template->block_data['openlist'] = $list;
        }elseif($cid == 0){
            $list = $ci->db->select('*')->from('app_packs')
                ->join('app_service','app_packs.p_app_id = app_service.o_app_id')
                ->like('app_title', $search)->order_by($order)->limit($num, $start)->where(array('p_state'=>2))->get()->result_array();
            $template->block_data['openlist'] = $list;
        }


    }

    if (isset($template->block_data['openlist']) && sizeof($template->block_data['openlist']) > 0) {
        $openlist = array_shift($template->block_data['openlist']);
        $template->assign(array('openlist' => $openlist));
        if (sizeof($template->block_data['openlist']) < 1) {
            unset($template->block_data['openlist']);
            $repeat = false;
        }
        $repeat = true;
    } else {
        $repeat = false;
    }

    return $content;
}
