<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['p/(:num)/(:any)/(:any)'] = 'home/produkdetail/$1/$2/$3';
$route['produkdaftar'] = 'home/produkdaftar';
$route['kategori/(:any)'] = 'home/kategori/$1';
$route['kontak'] = 'home/kontak';
$route['cari'] = 'home/cari_key';
$route['search'] = 'home/cari_s';
$route['register'] = 'home/signup';
$route['account'] = 'home/akun';
$route['login'] = 'home/sigin';
$route['logout'] = 'home/sigout';
$route['checkout'] = 'home/lanjut';
$route['city'] = 'home/city';
$route['getcost'] = 'home/getcost';
$route['cost'] = 'home/cost';
$route['token'] = 'home/token';
$route['send'] = 'home/send';
$route['method'] = 'home/met';
$route['forget'] = 'home/fopas';
$route['change'] = 'home/ganti';
