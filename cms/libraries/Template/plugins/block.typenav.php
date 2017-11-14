<?php
function smarty_block_typenav($params, $content, $template, &$repeat)
{
    $parent = isset($params['parent']) ? intval($params['parent']) : 0;
    $p_id = isset($params['id']) ? intval($params['id']) : 0;

    if (!$content) {
        $ci = &get_instance();
        $where = array();
        if ($p_id > 0) {
            $where['id'] = $p_id;
            $where['t_status'] = 1;
        }

        $list = $ci->db->select('*')->from('type')->where(array('t_status'=>2))->order_by('t_order desc')->get()->result_array();
        $template->block_data['typenav'] = $list;

    }

    if (isset($template->block_data['typenav']) && sizeof($template->block_data['typenav']) > 0) {
        $typenav = array_shift($template->block_data['typenav']);
        $template->assign(array('typenav' => $typenav));

        if (sizeof($template->block_data['typenav']) < 1) {
            unset($template->block_data['typenav']);
            $repeat = false;
        }
        $repeat = true;
    } else {
        $repeat = false;
    }

    return $content;
}
