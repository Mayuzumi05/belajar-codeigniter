<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'Book::index');
$routes->get('/home/delete/(:num)', 'Book::delete/$1');
