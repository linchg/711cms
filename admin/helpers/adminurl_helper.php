<?php
/**
 * Created by PhpStorm.
 * User: lincg
 * Date: 5/10/17
 * Time: 2:43 PM
 */
if(! function_exists('admin_index')){
    function admin_index()
    {
        $ci = get_instance();
        $index =  $ci->input->server('SCRIPT_NAME');
        if(!$index) {
            $index = $this->input->server('PHP_SELF');
        }
        if(!$index) {
            $uri = parse_url($this->input->server('REQUEST_URI'));
            $index = $uri['path'];
        }
        return $index;
    }
}

if(! function_exists('build_url')){
    function build_url($c,$m='', $args=array())
    {
        if($args) {
            return admin_index()."?c=$c&m=$m&".http_build_query($args);
        }
        if(!$m)
            $m = 'main';
        return admin_index()."?c=$c&m=$m";
    }
}

if( ! function_exists('static_url')){
    function static_url($uri)
    {
        return '/admin/static'.$uri;
    }
}