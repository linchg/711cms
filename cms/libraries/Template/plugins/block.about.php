<?php
function smarty_block_about($params, $content, $template, &$repeat)
{
    $cid    = isset($params['cid'])     ? intval($params['cid'])    : 0;
    $num    = isset($params['row'])     ? intval($params['row'])    : 10;
    $start  = isset($params['start'])   ? intval($params['start'])  : 1;
    $start  = $start - 1;
    $order  = isset($params['order']) ? $params['order'] : 'info_update_time desc';

    if (!$content) {
        $where = array("last_cate_id" => $cid, 'info_status' => 1);
        $ci = &get_instance();
        $list = $ci->db->select('*')->from('info')->where($where)->order_by($order)->limit($num, $start)->get()->result_array();
        $template->block_data['about'] = $list;
    }

    if (isset($template->block_data['about']) && sizeof($template->block_data['about']) > 0) {
        $about = array_shift($template->block_data['about']);
        $template->assign(array('about' => $about));
        if (sizeof($template->block_data['about']) < 1) {
            unset($template->block_data['about']);
            $repeat = false;
        }
        $repeat = true;
    } else {
        $repeat = false;
    }

    return $content;
}
