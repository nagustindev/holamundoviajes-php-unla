<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/auth/login', 'Auth::login');
$routes->get('/auth/register', 'Auth::register');
$routes->get('/auth/admin', 'Auth::admin', ['filter' => 'isAdmin']); // Panel de admin (Restringido a admins)
$routes->post('/auth/valida_login', 'Auth::valida_login');
$routes->post('/auth/register_post', 'Auth::register_post');
$routes->get('/auth/logout', 'Auth::logout');
$routes->get('/usuarios', 'Usuarios::list', ['filter' => 'isAdmin']); // Listado de usuarios (Restringido a admins)
$routes->get('/ventas', 'Ventas::list', ['filter' => 'isAdmin']); // Listado de ventas (Restringido a admins)
// Rutas de paquetes protegidas: solo accesibles por admin
$routes->group('paquetes', ['filter' => 'isAdmin'], function($routes){
    $routes->post('save', 'Paquetes::save'); // Guardar nuevo paquete
    $routes->post('update/(:num)', 'Paquetes::update/$1'); // Guardar cambios
    $routes->get('delete/(:num)', 'Paquetes::delete/$1'); // Eliminar paquete
});
