<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'home';
//$route['default_controller'] = 'maintenance';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;

#ROUTES
//$route['news'] = 'error404';
$route['news/local/p'] = 'news/local';
$route['news/local/p/(:num)'] = 'news/local';
$route['news/eua/p'] = 'news/eua';
$route['news/eua/p/(:num)'] = 'news/eua';
$route['news/fashion/p'] = 'news/fashion';
$route['news/fashion/p/(:num)'] = 'news/fashion';
$route['news/policy/p'] = 'news/policy';
$route['news/policy/p/(:num)'] = 'news/policy';
$route['news/clime/p'] = 'news/clime';
$route['news/clime/p/(:num)'] = 'news/clime';
$route['news/entertainment/p'] = 'news/entertainment';
$route['news/entertainment/p/(:num)'] = 'news/entertainment';
$route['news/technology/p'] = 'news/technology';
$route['news/technology/p/(:num)'] = 'news/technology';
$route['news/health/p'] = 'news/health';
$route['news/health/p/(:num)'] = 'news/health';
$route['news/sport/p'] = 'news/sport';
$route['news/sport/p/(:num)'] = 'news/sport';
$route['news/world/p'] = 'news/world';
$route['news/world/p/(:num)'] = 'news/world';
$route['services/academy/p'] = 'services/academy';
$route['services/academy/p/(:num)'] = 'services/academy';
$route['services/advocate/p'] = 'services/advocate';
$route['services/advocate/p/(:num)'] = 'services/advocate';
$route['services/agency/p'] = 'services/agency';
$route['services/agency/p/(:num)'] = 'services/agency';
$route['services/brasilianrestaurants/p'] = 'services/brasilianrestaurants';
$route['services/brasilianrestaurants/p/(:num)'] = 'services/brasilianrestaurants';
$route['services/carshop/p'] = 'services/carshop';
$route['services/carshop/p/(:num)'] = 'services/carshop';
$route['services/dentists/p'] = 'services/dentists';
$route['services/dentists/p/(:num)'] = 'services/dentists';
$route['services/exchange/p'] = 'services/exchange';
$route['services/exchange/p/(:num)'] = 'services/exchange';
$route['services/winch/p'] = 'services/winch';
$route['services/winch/p/(:num)'] = 'services/winch';
$route['forhome/construction/p'] = 'forhome/construction';
$route['forhome/construction/p/(:num)'] = 'forhome/construction';
$route['forhome/electrician/p'] = 'forhome/electrician';
$route['forhome/electrician/p/(:num)'] = 'forhome/electrician';
$route['forhome/furniture/p'] = 'forhome/furniture';
$route['forhome/furniture/p/(:num)'] = 'forhome/furniture';
$route['forhome/garden/p'] = 'forhome/garden';
$route['forhome/garden/p/(:num)'] = 'forhome/garden';
$route['forhome/painting/p'] = 'forhome/painting';
$route['forhome/painting/p/(:num)'] = 'forhome/painting';
$route['forhome/plumbers/p'] = 'forhome/plumbers';
$route['forhome/plumbers/p/(:num)'] = 'forhome/plumbers';
$route['classified/car/p'] = 'classified/car';
$route['classified/car/p/(:num)'] = 'classified/car';
$route['classified/immobile/p'] = 'classified/immobile';
$route['classified/immobile/p/(:num)'] = 'classified/immobile';
$route['classified/divers/p'] = 'classified/divers';
$route['classified/divers/p/(:num)'] = 'classified/divers';

//CPANEL
$route['admin'] = 'admin/login';
