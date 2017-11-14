<?php
function smarty_function_footer($params, &$smarty)
{

    $html1 = '';
    $html1 .= 'Copyright &copy';
    $html1 .= '2014-2017 ';
    $html1 .= '<a target="_blank" href="https://www.711cms.com">711CMS</a>版权所有';

    $ci = get_instance();
    $site = $ci->_site;

    $html = '';
    $html .= isset($site['count_code']) ? base64_decode($site['count_code']).'  ' : '';
    $html .= isset($site['site_beian']) ? $site['site_beian'].'  ' : '';

    if(isset($site['site_copyright']) && $site['site_copyright'])
        $html .= $site['site_copyright'];
    else
        $html .= $html1;

    return $html;
}
