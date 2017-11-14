<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Index/main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['app/(\d+)'] = 'Index/app/$1';
$route['search/(.+)'] = 'Index/search/$1';
$route['games'] = 'Index/games';
$route['games/(\d+)'] = 'Index/games/$1';
$route['games/(\d+)/(\d+)'] = 'Index/games/$1/$2';
$route['games/(\d+)/(\d+)/(\d+)'] = 'Index/games/$1/$2/$3';
$route['softs'] = 'Index/softs';
$route['softs/(\d+)'] = 'Index/softs/$1';
$route['softs/(\d+)/(\d+)'] = 'Index/softs/$1/$2';
$route['softs/(\d+)/(\d+)/(\d+)'] = 'Index/softs/$1/$2/$3';
$route['infos'] = 'Index/infos';
$route['infos/(\d+)'] = 'Index/infos/$1';
$route['infos/(\d+)/(\d+)'] = 'Index/infos/$1/$2';
$route['recommends'] = 'Index/recommends';
$route['recommends/(\d+)'] = 'Index/recommends/$1';
$route['recommends/(\d+)/(\d+)'] = 'Index/recommends/$1/$2';
$route['specials'] = 'Index/specials';
$route['ranks/(\d+)'] = 'Index/ranks/$1';
$route['ranks/(\d+)/(\d+)'] = 'Index/ranks/$1/$2';
$route['populars'] = 'Index/populars';
$route['categories/(\d+)'] = 'Index/categories/$1';
$route['categories/(\d+)/(\d+)'] = 'Index/categories/$1/$2';
$route['necessaries'] = 'Index/necessaries';
$route['necessaries/(\d+)'] = 'Index/necessaries/$1';
$route['necessaries/(\d+)/(\d+)'] = 'Index/necessaries/$1/$2';
$route['info/(\d+)'] = 'Index/info/$1';
$route['special/(\d+)'] = 'Index/special/$1';
$route['special/(\d+)/(\d+)'] = 'Index/special/$1/$2';
$route['download/(\d+)'] = 'Index/download/$1';
$route['map'] = 'Index/map';
$route['high_speed_download'] = 'Index/high_speed_download';
$route['qrcode/(\d+)'] = 'Index/qrcode/$1';
$route['xcode'] = 'Index/xcode';
