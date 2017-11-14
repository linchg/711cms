<?php

function smarty_function_countstar($params, &$smarty)
{
    $star = intval($params['star']) ? intval($params['star']) : 4;
    $type = isset($params['type']) ? intval($params['type']) : 0;
    if($type == 1){
        switch ($star) {
            case 1:
                return 10;
                break;
            case 2:
                return 20;
                break;
            case 3:
                return 30;
                break;
            case 4:
                return 40;
                break;
            case 5:
                return 50;
                break;
            default:
                return 50;
                break;
        }
    }
    if($type == 0){
        switch ($star) {
            case 1:
                return 'style="width:20%"';
                break;
            case 2:
                return 'style="width:40%"';
                break;
            case 3:
                return 'style="width:60%"';
                break;
            case 4:
                return 'style="width:80%"';
                break;
            case 5:
                return 'style="width:100%"';
                break;
            default:
                return 'style="width:100%"';
                break;
        }
    }

}
