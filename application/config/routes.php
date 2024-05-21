<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['PeliculaController/1'] = 'PeliculaController/index/tarjetas';
$route['PeliculaController/0'] = 'PeliculaController/index/';


$route['default_controller'] = 'indexController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
