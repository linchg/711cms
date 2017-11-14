<?php
function smarty_block_appnav($params, $content, $template, &$repeat)
{
    $parent = isset($params['parent']) ? intval($params['parent']) : 0;
    $num   = isset($params['row'])   ? intval($params['row'])   : 50;
    $start = isset($params['start']) && intval($params['start'])>0 ? intval($params['start']) : 0;
    $order = isset($params['order']) ? $params['order'] : 'cate_id asc';


    if (!$content) {
        $ci = &get_instance();
        $nav_where = array(
            'parent_id' => $parent,
            'cat_show' => 1
        );
        $list = $ci->db->select('*')->from('app_category')->where($nav_where)->order_by($order)->limit($num,$start)->get()->result_array();
        $template->block_data['appnav'] = $list;
    }
    if (isset($template->block_data['appnav']) && sizeof($template->block_data['appnav']) > 0) {
        $appnav = array_shift($template->block_data['appnav']);
        $template->assign(array('appnav' => $appnav));
        if (sizeof($template->block_data['appnav']) < 1) {
            unset($template->block_data['appnav']);
            $repeat = false;
        }
        $repeat = true;
    } else {
        $repeat = false;
    }

    return $content;
}
