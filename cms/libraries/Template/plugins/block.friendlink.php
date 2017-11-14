<?php
function smarty_block_friendlink($params, $content, &$template, &$repeat)
{
    $type = isset($params['type']) ? intval($params['type']) : 0;
    $num  = isset($params['row'])  ? intval($params['row'])  : 20;
    $num  = $num - 2;
    if ($num < 1) {
        $num = 1;
    }

    if (!$content) {
        $ci = get_instance();
        $default = array(
            array(
                'flink_id'      => 0,
                'flink_name'    => '711CMS',
                'flink_img'     => '',
                'flink_url'     => 'https://www.711cms.com',
                'flink_type'    => 2,
                'flink_order'   => 0,
                'flink_time'    => time(),
                'uid'           => 0
            ),
        );
        $where = array();
        if ($type > 0) {
            $where['flink_type'] = $type;
        }
        $list = $ci->db->select('*')->from('flink')->where($where)->order_by('flink_order desc, flink_id desc')->limit($num)->get()->result_array();

        $list = array_merge($default, $list);
        $template->block_data['friendlink'] = $list;
    }
    if (isset($template->block_data['friendlink']) && sizeof($template->block_data['friendlink']) > 0) {
        $friendlink = array_shift($template->block_data['friendlink']);
        $template->assign(array('friendlink' => $friendlink));
        if (sizeof($template->block_data['friendlink']) < 1) {
            unset($template->block_data['friendlink']);
            $repeat = false;
        }
        $repeat = true;
    } else {
        $repeat = false;
    }

    return $content;
}
