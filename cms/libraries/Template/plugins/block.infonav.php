<?php
function smarty_block_infonav($params, $content, $template, &$repeat)
{
    $parent = isset($params['parent']) ? intval($params['parent']) : 0;
    $cate_id = isset($params['cate_id']) ? intval($params['cate_id']) : 0;

    if (!$content) {
        $ci = &get_instance();
        $where = array();
        $where['cat_show'] = 1;
        if ($parent > 0) {
            $where['parent_id'] = $parent;
        }
        if ($cate_id > 0) {
            $where['cate_id'] = $cate_id;
        }
        $list = $ci->db->select('*')->from('info_category')->where($where)->get()->result_array();
        $template->block_data['infonav'] = $list;
    }

    if (isset($template->block_data['infonav']) && sizeof($template->block_data['infonav']) > 0) {
        $infonav = array_shift($template->block_data['infonav']);
        $template->assign(array('infonav' => $infonav));
        if (sizeof($template->block_data['infonav']) < 1) {
            unset($template->block_data['infonav']);
            $repeat = false;
        }
        $repeat = true;
    } else {
        $repeat = false;
    }

    return $content;
}
