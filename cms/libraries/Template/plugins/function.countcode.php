<?php
function smarty_function_countcode($params, &$smarty)
{
    $ci = get_instance();
    $site = $ci->_site;

    $html = '';
    $html .= isset($site['count_code2']) ? base64_decode($site['count_code2']) : '';
    return $html;
}