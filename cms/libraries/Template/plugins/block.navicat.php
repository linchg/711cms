<?php
function smarty_block_navicat($params, $content, $template, &$repeat)
{
    $num    = isset($params['row'])    ? intval($params['row'])     : 10;
    $start  = isset($params['start'])  ? intval($params['start'])   : 0;

    if (!$content) {
        $ci = &get_instance();
        $list = $ci->db->select('*')->from('navicat')->where(array('navicat_enabled' => 1))->order_by('navicat_order desc, navicat_id desc')->limit($num, $start)->get()->result_array();
        $i = 1;
        if(is_array($list) && sizeof($list) > 0){
            foreach($list as $k=>$v){
                $list[$k]['nav_sort_show']=$i++;
                $list[$k]['navicat_count']=sizeof($list);
            }
			 
        }
        $template->block_data['navicat'] = $list;
    }
    if (isset($template->block_data['navicat']) && sizeof($template->block_data['navicat']) > 0) {
        $navicat = array_shift($template->block_data['navicat']);
        $template->assign(array('navicat' => $navicat));
        if (sizeof($template->block_data['navicat']) < 1) {
            unset($template->block_data['navicat']);
            $repeat = false;
        }
        $repeat = true;
    } else {
        $repeat = false;
    }
    return $content;
}
