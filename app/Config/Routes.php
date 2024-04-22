<?php

use App\Controllers\Home;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
/* Landing Routes 
* Add routes that direct to static or non-action pages
* Non-action == Does not require data or values to be passed on
*/
$routes->get('/', [Home::class, 'index']);
$routes->get('(:segment)', [Home::class, 'view']);
$routes->get('/admin/(:segment)', [Home::class, 'admin']);
/*
* Get Value routes below
* For routing pages that pass get values
*/
// Example: $routes->get('/admin/(:segment)/(:segment)', [Home::class, 'some function to handle values'])