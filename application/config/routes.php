<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['items/create'] = 'items/create';
$route['items/search'] = 'items/search';
$route['items/(:any)'] = 'items/detail/$1';
$route['items'] = 'items/index';
$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
