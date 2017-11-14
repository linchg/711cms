<?php

function smarty_block_infolist($params, $content, $template, &$repeat)
{
    $cid   = isset($params['id'])    ? intval($params['id'])    : 0;
    $num   = isset($params['row'])   ? intval($params['row'])   : 10;
    $start = isset($params['start']) ? intval($params['start']) : 0;
    //$start = $start - 1;
    $order = isset($params['order']) ? $params['order'] : 'info_order desc, info_update_time desc';

    $page = isset($params['page']) ? intval($params['page']) : 0;
    $per_page = isset($params['per_page']) ? intval($params['per_page']) : 10;

    if (!$content) {
        //$where = array('info_status' => 1);
        $where = array(
            'info_publish_time <=' => time(),
            'info_status' => 1
        );
        if ($cid > 0) {
            $where['last_cate_id'] = $cid;
        }

        $ci = &get_instance();
        if (isset($params['page'])) {
            if ($page < 1) {
                $page = 1;
            }
            $num = $per_page;
            $start = ($page - 1) * $per_page;
        }
        $list = $ci->db->select('*')->from('info')->where($where)->order_by($order)->limit($num, $start)->get()->result_array();  
        $template->block_data['infolist'] = $list;
    }

    if (isset($template->block_data['infolist']) && sizeof($template->block_data['infolist']) > 0) {
        $infolist = array_shift($template->block_data['infolist']);
        $template->assign(array('infolist' => $infolist));
        if (sizeof($template->block_data['infolist']) < 1) {
            unset($template->block_data['infolist']);
            $repeat = false;
        }
        $repeat = true;
    } else {
        $repeat = false;
    }

    return $content;
}
