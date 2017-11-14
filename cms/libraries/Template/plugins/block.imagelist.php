<?php
function smarty_block_imagelist($params, $content, $template, &$repeat)
{
    $app_id = isset($params['app_id']) ? intval($params['app_id']) : 0;
    $num    = isset($params['row'])    ? intval($params['row'])    : 10;
    $start  = isset($params['start'])  ? intval($params['start'])  : 1;
    $start  = $start - 1;

    if (!$content) {
        $where = array();
        if ($app_id) {
            $where["info_app_id"] = $app_id;
            $where["type"] = 0;
        }
        $ci = &get_instance();
        $list = $ci->db->select('*')->from('resource')->where($where)->limit($num, $start)->get()->result_array();
        $local = $ci->db->select('*')->from('image_local')->where(array('app_id'=>$app_id))->limit($num, $start)->get()->row_array();
        if(is_array($local)&&sizeof($local)>0){
            foreach ($list as $key => $value) {
                $list[$key]['resource_url'] = '/uploads/local/'.$local['date'].'/'.$app_id.'/'.basename($list[$key]['resource_url']);
            }     
        }
        $template->block_data['imagelist'] = $list;
    }

    if (isset($template->block_data['imagelist']) && sizeof($template->block_data['imagelist']) > 0) {
        $imagelist = array_shift($template->block_data['imagelist']);
        $template->assign(array('imagelist' => $imagelist));
        if (sizeof($template->block_data['imagelist']) < 1) {
            unset($template->block_data['imagelist']);
            $repeat = false;
        }
        $repeat = true;
    } else {
        $repeat = false;
    }

    return $content;
}
