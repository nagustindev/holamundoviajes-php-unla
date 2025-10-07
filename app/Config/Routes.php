<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/auth/login', 'Auth::login');
$routes->get('/auth/register', 'Auth::register');
$routes->get('/auth/admin', 'Auth::admin', ['filter' => 'isAdmin']);
$routes->post('/auth/valida_login', 'Auth::valida_login');
$routes->post('/auth/register_post', 'Auth::register_post');
$routes->get('/auth/logout', 'Auth::logout');
// Rutas de paquetes protegidas: solo accesibles por admin
$routes->group('paquetes', ['filter' => 'isAdmin'], function($routes){
    $routes->get('', 'Paquetes::list'); // Listado de paquetes
    $routes->get('add', 'Paquetes::add'); // Formulario para agregar
    $routes->get('edit/(:num)', 'Paquetes::edit/$1'); // Formulario de edición
    $routes->post('save', 'Paquetes::save'); // Guardar nuevo paquete
    $routes->post('update/(:num)', 'Paquetes::update/$1'); // Guardar cambios
    $routes->get('delete/(:num)', 'Paquetes::delete/$1'); // Eliminar paquete
    // Alias en español dentro del mismo grupo
    $routes->get('agregar', 'Paquetes::add');
    $routes->get('editar/(:num)', 'Paquetes::edit/$1');
    $routes->post('guardar', 'Paquetes::save');
    $routes->post('actualizar/(:num)', 'Paquetes::update/$1');
    $routes->get('eliminar/(:num)', 'Paquetes::delete/$1');
});
