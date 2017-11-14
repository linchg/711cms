<?php

function smarty_block_seolist($params, $content, $template, &$repeat)
{
    $cid   = isset($params['id'])     ? intval($params['id'])      : 0;
    $parent = isset($params['parent']) ? intval($params['parent'])  : 0;
    $num    = isset($params['row'])    ? intval($params['row'])     : 10;
    $start  = isset($params['start'])  ? intval($params['start'])   : 1;
    $start  = $start - 1;
    $order  = isset($params['order'])  ? $params['order'] : 'app_service.o_id desc';

    $search  = isset($params['search'])  ? $params['search'] : '';
    $page = isset($params['page']) ? intval($params['page']) : 0;
    $per_page = isset($params['per_page']) ? intval($params['per_page']) : 10;


    if (!$content) {
        $where = array();
        if ($cid >0) {
            $where['o_type_id'] = $cid;
        }
        $where['o_status'] =2;
        $ci = get_instance();
        if (isset($params['page'])) {
            if ($page < 1) {
                $page = 1;
            }
            $num = $per_page;
            $start = ($page - 1) * $per_page;
        }

        if (!empty($search)) {
            $list = $ci->db->select('*')->from('app_service')
              ->like('o_apptitle', $search)->order_by($order)->limit($num, $start)->get()->result_array();
            if (is_array($list) && sizeof($list) > 0) {
                $search_info = $ci->db->select('*')->from('search')->where(array('q' => $search))->get()->row_array();
                if (is_array($search_info) && sizeof($search_info) > 0) {
                    $ci->db->set('qnum', 'qnum+1', false)->where(array('q' => $search))->update('search');
                } else {
                    $ci->db->insert('search', array('q' => $search, 'qnum' => 1, 'qorder' => 0));
                }
            }

        } else {
            $list = $ci->db->select('*')->from('app_service')
              ->like('o_apptitle', $search)->order_by($order)->limit($num, $start)->where($where)->get()->result_array();
        }
        $template->block_data['seolist'] = $list;
    }

    if (isset($template->block_data['seolist']) && sizeof($template->block_data['seolist']) > 0) {
        $seolist = array_shift($template->block_data['seolist']);
        $template->assign(array('seolist' => $seolist));
        if (sizeof($template->block_data['seolist']) < 1) {
            unset($template->block_data['seolist']);
            $repeat = false;
        }
        $repeat = true;
    } else {
        $repeat = false;
    }
    return $content;
}
