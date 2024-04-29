<?php

use App\Controllers\Home;
use App\Controllers\Login;
use App\Controllers\Signup;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
/* Landing Routes 
* Add routes that direct to static or non-action pages
* Non-action == Does not require data or values to be passed on
*/
$routes->get('/', [Home::class, 'index']);
$routes->get('(:segment)', [Home::class, 'user']);
$routes->get('/admin/(:segment)', [Home::class, 'admin']);
/*
* Get Value routes below
* For routing pages that pass get values
*/
// Example: $routes->get('/admin/(:segment)/(:segment)', [Home::class, 'some function to handle values'])
/* Form route area */
$routes->get('account/signup', [Signup::class, 'index']);
$routes->get('account/login', [Login::class, 'index']);
$routes->post('signup/step2', [Signup::class, 'step1']);
$routes->post('signup/step3', [Signup::class, 'step2']);
$routes->post('signup/finish', [Signup::class, 'step3']);
