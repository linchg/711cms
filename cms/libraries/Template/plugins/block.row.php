<?php

function smarty_block_row($params, $content, $template, &$repeat)
{
    $id   = isset($params['id'])    ? intval($params['id'])    : 0;
    $name = isset($params['name'])  ? $params['name']          : 'special';

    if (!$content) {
        $names = array(
            'advert'        => 'ad_id',
            'app'           => 'app_id',
            'app_category'  => 'cate_id',
            'flink'         => 'flink_id',
            'history'       => 'history_id',
            'info'          => 'info_id',
            'info_category' => 'cate_id',
            'necessary'     => 'necessary_id',
            'recommend'     => 'area_id',
            'special'       => 'area_id',
            'navicat'       => 'navicat_id',
            'type'       => 'type_id'
        );
        if (!isset($names[$name])) {
            $name = 'special';
        }
        $ci = &get_instance();
        $row = array();
        $where = array();
        if ($id > 0) {
            $where[$names[$name]] = $id;
            $row = $ci->db->select('*')->from($name)->where($where)->get()->row_array();
            if(isset($row['area_ids']) && !empty($row['area_ids'])){
                $row['ids_num'] = count(explode(',', $row['area_ids']));
            }

            if ($name == 'app' && !empty($row['last_cate_id'])) {
                $app = &$row;
                $site_name = !empty($ci->_site['site_name']) ? $ci->_site['site_name'] : '';
                $site_url  = !empty($ci->_site['site_url'])  ? $ci->_site['site_url']  : '';

                $category = $ci->db->select('*')->from('app_category')->where(array('cate_id' => $row['last_cate_id']))->get()->row_array();
                if (is_array($category) && sizeof($category) > 0) {
                    $cate_type = $category['parent_id'] == 2 ? '游戏' : '软件';
                    if (!empty($category['app_ctitle'])) {
                        $category['app_ctitle'] = str_ireplace('{site_name}',       $site_name,             $category['app_ctitle']);
                        $category['app_ctitle'] = str_ireplace('{site_url}',        $site_url,              $category['app_ctitle']);
                        $category['app_ctitle'] = str_ireplace('{site_url}',        $site_url,              $category['app_ctitle']);
                        $category['app_ctitle'] = str_ireplace('{cate_name}',       $category['cname'],     $category['app_ctitle']);
                        $category['app_ctitle'] = str_ireplace('{cate_name_py}',    $category['cname_py'],  $category['app_ctitle']);
                        $category['app_ctitle'] = str_ireplace('{cate_type}',       $cate_type,             $category['app_ctitle']);
                        $category['app_ctitle'] = str_ireplace('{app_name}',        $app['app_title'],      $category['app_ctitle']);
                        $category['app_ctitle'] = str_ireplace('{app_tags}',        $app['app_tags'],       $category['app_ctitle']);
                        $category['app_ctitle'] = str_ireplace('{app_company}',     $app['app_tags'],       $category['app_ctitle']);
                        $app['app_stitle'] = $category['app_ctitle'];
                    }
                    if (!empty($category['app_ckey'])) {
                        $category['app_ckey'] = str_ireplace('{site_name}',         $site_name,             $category['app_ckey']);
                        $category['app_ckey'] = str_ireplace('{site_url}',          $site_url,              $category['app_ckey']);
                        $category['app_ckey'] = str_ireplace('{site_url}',          $site_url,              $category['app_ckey']);
                        $category['app_ckey'] = str_ireplace('{cate_name}',         $category['cname'],     $category['app_ckey']);
                        $category['app_ckey'] = str_ireplace('{cate_name_py}',      $category['cname_py'],  $category['app_ckey']);
                        $category['app_ckey'] = str_ireplace('{cate_type}',         $cate_type,             $category['app_ckey']);
                        $category['app_ckey'] = str_ireplace('{app_name}',          $app['app_title'],      $category['app_ckey']);
                        $category['app_ckey'] = str_ireplace('{app_tags}',          $app['app_tags'],       $category['app_ckey']);
                        $category['app_ckey'] = str_ireplace('{app_company}',       $app['app_tags'],       $category['app_ckey']);
                        $app['app_seokey'] = $category['app_ckey'];
                    }
                    if (!empty($category['app_cdesc'])) {
                        $category['app_cdesc'] = str_ireplace('{site_name}',         $site_name,             $category['app_cdesc']);
                        $category['app_cdesc'] = str_ireplace('{site_url}',          $site_url,              $category['app_cdesc']);
                        $category['app_cdesc'] = str_ireplace('{site_url}',          $site_url,              $category['app_cdesc']);
                        $category['app_cdesc'] = str_ireplace('{cate_name}',         $category['cname'],     $category['app_cdesc']);
                        $category['app_cdesc'] = str_ireplace('{cate_name_py}',      $category['cname_py'],  $category['app_cdesc']);
                        $category['app_cdesc'] = str_ireplace('{cate_type}',         $cate_type,             $category['app_cdesc']);
                        $category['app_cdesc'] = str_ireplace('{app_name}',          $app['app_title'],      $category['app_cdesc']);
                        $category['app_cdesc'] = str_ireplace('{app_tags}',          $app['app_tags'],       $category['app_cdesc']);
                        $category['app_cdesc'] = str_ireplace('{app_company}',       $app['app_tags'],       $category['app_cdesc']);
                        $app['app_seodesc'] = $category['app_cdesc'];
                    }
                    $row = $app;
                }
            }
        }
        $template->block_data['row'] = $row;
    }


    if (isset($template->block_data['row']) && sizeof($template->block_data['row']) > 0) {
        $row = $template->block_data['row'];
        $template->assign(array('row' => $row));
        unset($template->block_data['row']);
        $repeat = true;
    } else {
        $repeat = false;
    }

    return $content;
}
