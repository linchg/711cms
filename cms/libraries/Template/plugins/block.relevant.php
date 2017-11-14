<?php
function smarty_block_relevant($params, $content, $template, &$repeat)
{
    $cid    = isset($params['cid'])     ? intval($params['cid'])    : 0;
    $num    = isset($params['row'])     ? intval($params['row'])    : 10;
    $start  = isset($params['start'])   ? intval($params['start'])  : 1;
    $start  = $start - 1;
    $order  = isset($params['order']) ? $params['order'] : 'app_update_time desc';

    if (!$content) {
        $where = array("last_cate_id" => $cid);
        $ci = &get_instance();
        $list = $ci->db->select('*')->from('app')->join('history', 'app.app_id = history.app_id')
            ->where($where)->order_by($order)->limit($num, $start)->get()->result_array();
        foreach($list as $k=>$v){
            if($k == 0){
                continue;
            }
            $list2 = array();
            $list2 = $list[$k-1];
            if($v['app_id'] == $list2['app_id']){
                unset($list[$k-1]);
            }
            //当前应用无法本地化
            $local = $ci->db->select('*')->from('image_local')->where(array('app_id' => $v['app_id']))->get()->row_array();
            if(is_array($local)&&sizeof($local)>0){ 
                $list[$k]['app_logo'] = '/uploads/local/'.$local['date'].'/'.$v['app_id'].'/'.basename($list[$k]['app_logo']);   
            }
        }
        $template->block_data['relevant'] = $list;
    }

    if (isset($template->block_data['relevant']) && sizeof($template->block_data['relevant']) > 0) {
        $relevant = array_shift($template->block_data['relevant']);
        $template->assign(array('relevant' => $relevant));
        if (sizeof($template->block_data['relevant']) < 1) {
            unset($template->block_data['relevant']);
            $repeat = false;
        }
        $repeat = true;
    } else {
        $repeat = false;
    }

    return $content;
}
