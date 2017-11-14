<?php

function smarty_function_pagebar($params, &$smarty)
{

    $ci = &get_instance();
    $ci->load->model('m_Setting', 'm_setting');
    $ci->load->library('pagination');

    $template = !empty($ci->_site['template']) ? $ci->_site['template'] : '';
    $config = $ci->m_setting->getTemplateConfig($template);
    $config = $config['pagination'];

    if (isset($params['per_page']) && intval($params['per_page']) > 0) {
        $config['per_page'] = intval($params['per_page']);
    }
    if(!isset($config['per_page']) || $config['per_page'] <= 0 )
        $config['per_page'] = 10;

    $count = 0;
    $where = array();
    $name = isset($params['name']) ? $params['name'] : 'infolist';

    if ($name == 'infolist') {

        $cid = isset($params['id']) ? intval($params['id']) : 0;
        if ($cid > 0) {
            $where['last_cate_id'] = $cid;
        }
        $names = array('infolist' => 'infos');
        $tables = array('infolist' => 'info');
        $count = $ci->db->select("count(*) cnt")->from($tables[$name])->where($where)->get()->row_array();
        $count = !empty($count['cnt']) ? $count['cnt'] : 0;

        $config['base_url'] = build_url('index', $names[$name], array('last_cate_id' => $cid));

    } else if ($name == 'applist') {

        $cid = isset($params['id'])    ? intval($params['id'])    : 0;
        if ($cid > 0) {
            $where['app.last_cate_id'] = $cid;
        }
        $parent = isset($params['parent']) ? intval($params['parent'])  : 0;
        $url = isset($params['url']) ? $params['url']  : '';
        $order = isset($params['order']) ? $params['order']  : 0;  //1.下载次数2.更新时间
        if ($parent > 0) {
            $where['app_category.parent_id'] = $parent;
        }
        if ($parent == 1) {
            if($url){
                $names = array('applist' => $url);
            }else{
                $names = array('applist' => 'softs');
            }

        } else if ($parent == 2) {
            if($url){
                $names = array('applist' => $url);
            }else{
                $names = array('applist' => 'games');
            }
        }
        $arg = array('cate_id' => $cid);
        if($order > 0){
            $arg = array('cate_id' => $cid,'order'=>$order);
        }

        $tables = array('applist' => 'app');
        $count = $ci->db->select("count(*) cnt")->from($tables[$name])->join('app_category', 'app_category.cate_id = app.last_cate_id')
            ->where($where)->get()->row_array();
        $count = !empty($count['cnt']) ? $count['cnt'] : 0;

        $config['base_url'] = build_url('index', $names[$name], $arg);

    } else if ($name == 'special_list') {
        $special_id = isset($params['id'])    ? intval($params['id'])    : 0;
        if ($special_id > 0) {
            $where['area_id'] = $special_id;
        }
        $arg = array('special_id' => $special_id);
        $tables = array('special_list' => 'special');
        $special = $ci->db->select("*")->from($tables[$name])->where($where)->get()->row_array();
        $area_ids = $special['area_ids'];
        $area_arr = explode(',',$area_ids);
        $count = count($area_arr);
        $config['base_url'] = build_url('index', "specials", $arg);

    } else if ($name == 'necessary_list') {
        $necessary_type = isset($params['type'])  ? intval($params['type'])    : 0;

        if ($necessary_type > 0) {
            $where['necessary_type'] = $necessary_type;
        }
        $arg = array('necessary_type' => $necessary_type);
        $tables = array('necessary_list' => 'necessary');
        $special = $ci->db->select("*")->from($tables[$name])->where($where)->get()->row_array();
        $area_ids = $special['necessary_list'];
        $area_arr = explode(',',$area_ids);
        $count = count($area_arr);
        $config['base_url'] = build_url('index', "necessaries", $arg);
    } else if ($name == 'recommend_list') {
        $recommend_id = isset($params['id'])  ? intval($params['id'])    : 0;

        if ($recommend_id > 0) {
            $where['area_id'] = $recommend_id;
        }
        $arg = array('id' => $recommend_id);
        $tables = array('recommend_list' => 'recommend');
        $recommend = $ci->db->select("*")->from($tables[$name])->where($where)->get()->row_array();
        $area_ids = $recommend['area_ids'];
        $area_arr = explode(',',$area_ids);
        $count = count($area_arr);
        $config['base_url'] = build_url('index', "recommends", $arg);
    }else if ($name == 'openlist') {
        $cid = isset($params['p_id']) ? intval($params['p_id']) : 0;
        if ($cid > 0) {
            $where['p_type_id'] = $cid;
        }
        $where['p_state'] =2;
        $names = array('openlist' => 'list_packs');
        $tables = array('openlist' => 'app_packs');
        $count = $ci->db->select("count(*) cnt")->from($tables[$name])->where($where)->get()->row_array();
        $count = !empty($count['cnt']) ? $count['cnt'] : 0;

        $config['base_url'] = build_url('index', $names[$name], array('p_type_id' => $cid));
    }else if ($name == 'seolist') {
        $cid = isset($params['id']) ? intval($params['id']) : 0;
        if ($cid >0) {
            $where['o_type_id'] = $cid;
        }
        $where['o_status'] =2;
        $names = array('seolist' => 'list_service');
        $tables = array('seolist' => 'app_service');
        $count = $ci->db->select("count(*) cnt")->from($tables[$name])->where($where)->get()->row_array();
        $count = !empty($count['cnt']) ? $count['cnt'] : 0;
        $config['base_url'] = build_url('index', $names[$name], array('o_type_id' => $cid));

    }
    $config['total_rows'] = $count;
    $ci->pagination->initialize($config);

    return $ci->pagination->create_links();
}
