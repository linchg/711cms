<?php

function smarty_block_ad($params, $content, $template, &$repeat)
{
    $id   = isset($params['id'])   ? intval($params['id'])   : 0;
    if (!$content) {
        $where = array();
        $where['ad_id'] = $id;

        $ci = &get_instance();
        $ads = array();
        $i = 1;
        $ad = $ci->db->select('*')->from('advert')->where($where)->get()->row_array();
        if (is_array($ad) && sizeof($ad) > 0) {
            $images = array();
            $alts   = array();
            $links  = array();
            if (!empty($ad['ad_images'])) {
                $images = explode('|', $ad['ad_images']);
            }
            if (!empty($ad['ad_alts'])) {
                $alts = explode('|', $ad['ad_alts']);
            }
            if (!empty($ad['ad_links'])) {
                $links = explode('|', $ad['ad_links']);
            }
            if (is_array($images) && sizeof($images) > 0) {
                foreach ($images as $key => $img) {
                    $ads[$key]['image'] = $img;
                    $ads[$key]['alt']   = isset($alts[$key])    ? $alts[$key]   : '';
                    $ads[$key]['link']  = isset($links[$key])   ? $links[$key]  : '';
                    $ads[$key]['sort_show']  = $i++;
                }
            }
        }
        $template->block_data['ad'] = $ads;
    }

    if (isset($template->block_data['ad']) && sizeof($template->block_data['ad']) > 0) {
        $ad = array_shift($template->block_data['ad']);
        $template->assign(array('ad' => $ad));
        if (sizeof($template->block_data['ad']) < 1) {
            unset($template->block_data['ad']);
            $repeat = false;
        }
        $repeat = true;
    } else {
        $repeat = false;
    }

    return $content;
}
