<?php
$default_controller='home';
$notfound_controller='notfound';

//override default routing
//make sure dont add any traing slash in array key of routes

//example $routes['produk/(:any)'] = 'produk/detail/index/$1';
//example $routes['blog/id/(:num)/(:any)'] = 'blog/detail/index/$1/$2';
$routes['produk/(:any)'] = 'produk/detail/index/$1';
$routes['produk/detail/(:any)'] = 'produk/detail/index/$1';
$routes['checkout/berhasil/(:any)'] = 'checkout/berhasil/index/$1';
$routes['konfirmasi/(:any)'] = 'konfirmasi/index/$1';


//dukungan
$routes['dukungan/kebijakan-privasi'] = 'dukungan/kebijakan_privasi';
$routes['dukungan/syarat-ketentuan'] = 'dukungan/syarat_ketentuan';
//$routes['produk/(:any)/(:any)'] = 'produk/detail/index/$1/$2';
