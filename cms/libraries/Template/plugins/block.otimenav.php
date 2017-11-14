<?php
function smarty_block_otimenav($params, $content, $template, &$repeat)
{
    $parent = isset($params['parent']) ? intval($params['parent']) : 0;
    $p_id = isset($params['t_id']) ? intval($params['t_id']) : 0;

    if (!$content) {
        $ci = &get_instance();
        $where = array();

        if ($parent > 0) {
            $where['parent_id'] = $parent;
        }
        if ($p_id > 0) {
            $where['t_id'] = $p_id;
        }
        $list = $ci->db->select('*')->from('open_time')->where($where)->get()->result_array();
        $template->block_data['otimenav'] = $list;
    }

    if (isset($template->block_data['otimenav']) && sizeof($template->block_data['otimenav']) > 0) {
        $otimenav = array_shift($template->block_data['otimenav']);
        $template->assign(array('otimenav' => $otimenav));

        if (sizeof($template->block_data['otimenav']) < 1) {
            unset($template->block_data['otimenav']);
            $repeat = false;
        }
        $repeat = true;
    } else {
        $repeat = false;
    }
    return $content;
}
