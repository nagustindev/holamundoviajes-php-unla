<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/auth/login', 'Auth::login', ['filter' => 'isUser:guest']);
$routes->get('/ayuda', 'Ayuda::ayuda');
$routes->get('/ayuda/about', 'Ayuda::about');
$routes->get('/ayuda/faq', 'Ayuda::faq');
$routes->get('/ayuda/contact', 'Ayuda::contact');
$routes->get('/auth/register', 'Auth::register', ['filter' => 'isUser:guest']);
$routes->get('/auth/admin', 'Auth::admin', ['filter' => 'isAdmin']);
$routes->post('/auth/valida_login', 'Auth::valida_login', ['filter' => 'isUser:guest']);
$routes->post('/auth/register_post', 'Auth::register_post', ['filter' => 'isUser:guest']);
$routes->get('/auth/logout', 'Auth::logout');
$routes->get('/usuarios', 'Usuarios::list', ['filter' => 'isAdmin']);
$routes->get('/usuarios/mis_viajes', 'Usuarios::mis_viajes', ['filter' => 'isUser']);
$routes->get('/ventas', 'Ventas::list', ['filter' => 'isAdmin']);
$routes->get('paquetes/comprar/(:num)', 'Home::comprar/$1', ['filter' => 'isUser']);
$routes->group('paquetes', ['filter' => 'isAdmin'], function($routes){
    $routes->post('save', 'Paquetes::save');
    $routes->post('update/(:num)', 'Paquetes::update/$1');
    $routes->get('delete/(:num)', 'Paquetes::delete/$1');
});
