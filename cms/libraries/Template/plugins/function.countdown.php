<?php
function smarty_function_countdown($params, &$smarty)
{
    $down = intval($params['down']) ? intval($params['down']) : 10000;
    if($down >= 10000000){
        $down = round($down/100000000,2).'亿';
    }
    if($down >= 10000 && $down < 10000000 ){
        $down = round($down/10000,2).'万';
    }
    return $down;
}