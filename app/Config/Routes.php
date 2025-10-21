<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/auth/login', 'Auth::login', ['filter' => 'isUser']);
$routes->get('/auth/register', 'Auth::register', ['filter' => 'isUser']);
$routes->get('/auth/admin', 'Auth::admin', ['filter' => 'isAdmin']); // Panel de admin (Restringido a admins)
$routes->post('/auth/valida_login', 'Auth::valida_login', ['filter' => 'isUser']);
$routes->post('/auth/register_post', 'Auth::register_post', ['filter' => 'isUser']);
$routes->get('/auth/logout', 'Auth::logout');
$routes->get('/usuarios', 'Usuarios::list', ['filter' => 'isAdmin']); // Listado de usuarios (Restringido a admins)
$routes->get('/ventas', 'Ventas::list', ['filter' => 'isAdmin']); // Listado de ventas (Restringido a admins)
$routes->get('paquetes/comprar/(:num)', 'Home::comprar/$1');
// Rutas de paquetes protegidas: solo accesibles por admin
$routes->group('paquetes', ['filter' => 'isAdmin'], function($routes){
    $routes->post('save', 'Paquetes::save'); // Guardar nuevo paquete
    $routes->post('update/(:num)', 'Paquetes::update/$1'); // Guardar cambios
    $routes->get('delete/(:num)', 'Paquetes::delete/$1'); // Eliminar paquete
});
