<?php

function smarty_block_list($params, $content, $template, &$repeat)
{
    $name  = isset($params['name'])  ? $params['name']          : 'special';
    $num   = isset($params['row'])   ? intval($params['row'])   : 10;
    $start = isset($params['start']) ? intval($params['start']) : 1;
    $start = $start - 1;
    $order = isset($params['order']) ? $params['order'] : 'area_order desc, area_id desc';

    if (!$content) {
        $names = array(
            'recommend' => 'area_order desc, area_id desc',
            'advert'    => 'ad_id desc',
            'necessary' => 'necessary_order desc, necessary_id desc',
            'special'   => 'area_order desc, area_id desc',
            'app_comment'   => 'comment_date desc',
            'search'    => 'qnum desc',
            'app_service'    => 'o_id desc',
            'type'    => 'id desc',
            'app_packs'    => 'p_id desc',
            'ball'    => 'b_id desc'
        );
        if (!isset($names[$name])) {
            $name = 'special';
        }
        $order = $names[$name];

        $where = array();
        if ($name == 'necessary') {
            $type = isset($params['type']) ? intval($params['type'])   : 0;
            if ($type > 0) {
                $where['necessary_type'] = $type;
            }
        }
        if($name == 'app_comment'){
            $id = isset($params['id']) ? intval($params['id'])   : 0;
            if ($id > 0) {
                $where['info_app_id'] = $id;
                $where['comment_check'] = 1;
            }
        }
        if ($name == 'app_packs') {
            $type = isset($params['app_title']) ? $params['app_title']   : 0;
            if ($type) {
                $where['app_title'] = $type;
                $where['p_state'] =2;

            }
        }
        if ($name == 'ball') {
            $type = isset($params['b_id']) ? $params['b_id']   : 0;
            if ($type) {
                $where['b_p_id'] = $type;
                $where['b_status'] =0;
            }
        }
        if($name == 'search'){
            $type = isset($params['type']) ? intval($params['type'])   : 0;
            if ($type > 0) {
                $where['q_type'] = $type;
            }
        }
        $list = array();
        $ci = &get_instance();
        $list = $ci->db->select('*')->from($name)->where($where)->order_by($order)->limit($num, $start)->get()->result_array();
        $i = 1;
        if($list){
            foreach($list as $k=>$v){
                $list[$k]['special_sort_show'] = $i++;
            }
        }
        $template->block_data['list'] = $list;
    }

    if (isset($template->block_data['list']) && sizeof($template->block_data['list']) > 0) {
        $list = array_shift($template->block_data['list']);
        $template->assign(array('list' => $list));
        if (sizeof($template->block_data['list']) < 1) {
            unset($template->block_data['list']);
            $repeat = false;
        }
        $repeat = true;
    } else {
        $repeat = false;
    }

    return $content;
}
