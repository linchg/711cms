<?php
/**
 * build_url是输出SEO更加友好的地址
 * 与routes.php里面的对应，用在页面可见链接地址
 */
if(! function_exists('build_url')){
    function build_url($c, $m, $args=array())
    {
        foreach($args as &$v){
            $v = urlencode($v);
        }
        $url = site_url(array('c'=>$c, 'm'=>$m) + $args);
        if(!config_item('enable_query_strings')){
            $url = str_ireplace('index/','',$url);
        }
        return $url;
    }
}

/**
 * 给api.php控制器使用的，获取站点请求url
 */
if(!function_exists('api_site_url')){
    function api_site_url($c, $m, $args=array())
    {
        if(file_exists(APPPATH.'config/assign.php'))
        {
            $url = base_url()."$m/".implode('/', array_values($args)).".html";
            return $url;
        }
        return base_url().'?'.http_build_query(array_merge(array('c'=>$c, 'm'=>$m), $args));

    }
}

if( ! function_exists('static_url')){
    function static_url($uri)
    {
        return 'static/'.$uri;
    }
}