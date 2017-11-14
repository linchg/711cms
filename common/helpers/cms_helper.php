<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: lincg
 * Date: 5/3/17
 * Time: 4:21 PM
 */

if(! function_exists('lock_file_name'))
{
    function lock_file_name()
    {
        return DATAPATH.'install'.DIRECTORY_SEPARATOR.'install.lock.php';
    }
}

if(! function_exists('is_install'))
{
    function is_install()
    {
        return file_exists(lock_file_name());
    }
}

if(! function_exists('lock_install'))
{
    function lock_install()
    {
        return file_put_contents(lock_file_name(), time());
    }
}

if(! function_exists('admin_password'))
{
    function admin_password($upass)
    {
        return  md5($upass.sha1(config_item('encryption_key')).$upass);
    }
}

if(!function_exists('appToken'))
{
    function appToken($args, $private)
    {
        return md5(implode('|',$args).$private);
    }
}

if(!function_exists('appSize'))
{
    function appSize($size)
    {
        return round($size/1000000,2);
    }
}

if(!function_exists('cms711_url'))
{
    function cms711_url($page)
    {
        return 'http://www.711cms.com/'.$page;
    }
}

if(!function_exists('root_path'))
{
    function root_path($folder)
    {
        return FCPATH.ltrim($folder,DIRECTORY_SEPARATOR);
    }
}

if(!function_exists('image_url'))
{
    function image_url($url)
    {
        if($url == '' || $url == 'undefined' || $url == 'http://cdn.711cms.net/'){
            return '/templates/cates/no_picture.png';
        }
        return $url;
    }
}

if(!function_exists('is_nginx'))
{
    function is_nginx()
    {
        $token = $_SERVER['SERVER_SOFTWARE'];
        return strstr(strtolower($token), 'nginx');
    }
}