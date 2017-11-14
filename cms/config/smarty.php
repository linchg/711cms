<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: lincg
 * Date: 5/5/17
 * Time: 5:50 PM
 */

$config['theme']        = 'default';
$config['template_dir'] = FCPATH . 'templates'.DIRECTORY_SEPARATOR.'template1';
$config['compile_dir']  = FCPATH . 'templates'.DIRECTORY_SEPARATOR.'templates_c';
$config['cache_dir']    = FCPATH . 'templates'.DIRECTORY_SEPARATOR.'cache';
$config['config_dir']   = FCPATH . 'templates'.DIRECTORY_SEPARATOR.'configs';
$config['caching']      = true;
$config['lefttime']     = 60;