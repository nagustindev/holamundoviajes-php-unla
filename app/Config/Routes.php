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
