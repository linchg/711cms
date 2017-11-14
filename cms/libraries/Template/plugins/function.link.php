<?php
function smarty_function_link($params, &$smarty)
{
    $c = isset($params['c']) ? $params['c'] : 'index';
    $m = isset($params['m']) ? $params['m'] : 'main';

    if ($m == 'index') {
        $m = 'main';
    }
    if($c == 'index' && in_array($m, array('index','main'))){
        return "/";
    }
    if (stripos($m, 'http://') === 0 || strpos($m, 'https://') === 0) {
        return $m;
    }
    unset($params['c']);
    unset($params['m']);
    return build_url($c, $m, $params);
}
