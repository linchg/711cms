<?php
function smarty_block_keyword($params, $content, &$template, &$repeat)
{
    $num = isset($params['row']) ? intval($params['row']) : 10;

    if (!$content) {
        $ci = &get_instance();
        $list = $ci->db->select('*')->from('search')->order_by('qorder desc, qnum desc')->limit($num)->get()->result_array();
        $template->block_data['keyword'] = $list;
    }
    if (isset($template->block_data['keyword']) && sizeof($template->block_data['keyword']) > 0) {
        $keyword = array_shift($template->block_data['keyword']);
        $template->assign(array('keyword' => $keyword));
        if (sizeof($template->block_data['keyword']) < 1) {
            unset($template->block_data['keyword']);
            $repeat = false;
        }
        $repeat = true;
    } else {
        $repeat = false;
    }

    return $content;
}
