<?php

function smarty_function_imageurl($params, &$smarty)
{
    $url = $params['url'] ? $params['url'] : '';
    if (empty($url) || $url == 'http://cdn.711cms.net/') {
        return '/templates/cates/no_picture.png';
    }
    return $url;
}
