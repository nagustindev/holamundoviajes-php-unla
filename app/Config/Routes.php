<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/auth/login', 'Auth::login');
$routes->get('/auth/register', 'Auth::register');
$routes->get('/auth/admin', 'Auth::admin');
$routes->post('/auth/valida_login', 'Auth::valida_login');
$routes->post('/auth/register_post', 'Auth::register_post');
$routes->get('/auth/logout', 'Auth::logout');
$routes->get('/paquetes', 'Paquetes::list'); // Listado de paquetes
$routes->get('/paquetes/add', 'Paquetes::add'); // Formulario para agregar
$routes->get('/paquetes/edit/(:num)', 'Paquetes::edit/$1'); // Formulario de edición
$routes->post('/paquetes/save', 'Paquetes::save'); // Guardar nuevo paquete
$routes->post('/paquetes/update/(:num)', 'Paquetes::update/$1'); // Guardar cambios
$routes->get('/paquetes/delete/(:num)', 'Paquetes::delete/$1'); // Eliminar paquete