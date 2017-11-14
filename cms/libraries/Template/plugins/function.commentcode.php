<?php
function smarty_function_commentcode($params, &$smarty)
{
    $ci = get_instance();
    $site = $ci->_site;

    $html = '';
    $html .= isset($site['comment_code']) ? base64_decode($site['comment_code']) : '';
    return $html;
}