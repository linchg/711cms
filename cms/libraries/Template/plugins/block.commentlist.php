<?php
function smarty_block_commentlist($params, $content, $template, &$repeat)
{
    $app_id  = isset($params['app_id'])  ? intval($params['app_id'])  : 0;
    $info_id = isset($params['info_id']) ? intval($params['info_id']) : 0;
    $num    = isset($params['row'])    ? intval($params['row'])    : 10;
    $order    = isset($params['order'])    ? $params['order']  : 'comment_date desc';
    $start  = isset($params['start'])  ? intval($params['start'])  : 1;
    $start  = $start - 1;

    if (!$content) {
        $ci = &get_instance();
        $where = array('comment_check' => 1);
        $list = array();

        if ($app_id > 0) {
            $where["info_app_id"] = $app_id;
            $list = $ci->db->select('*')->from('app_comment')->where($where)->order_by($order)->limit($num, $start)->get()->result_array();
        } else if ($info_id > 0) {
            $where["info_app_id"] = $app_id;
            $list = $ci->db->select('*')->from('info_comment')->where($where)->order_by($order)->limit($num, $start)->get()->result_array();
        }
        $template->block_data['commentlist'] = $list;
    }

    if (isset($template->block_data['commentlist']) && sizeof($template->block_data['commentlist']) > 0) {
        $commentlist = array_shift($template->block_data['commentlist']);
        $template->assign(array('commentlist' => $commentlist));
        if (sizeof($template->block_data['commentlist']) < 1) {
            unset($template->block_data['commentlist']);
            $repeat = false;
        }
        $repeat = true;
    } else {
        $repeat = false;
    }
    return $content;
}
