<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'Book::index');
$routes->post('/home/store', 'Book::store');
$routes->get('/home/edit/(:num)', 'Book::edit/$1');
$routes->post('/home/update/(:num)', 'Book::update/$1');
$routes->get('/home/delete/(:num)', 'Book::delete/$1');
