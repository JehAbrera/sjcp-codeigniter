<?php

use App\Controllers\Home;
use App\Controllers\Login;
use App\Controllers\Signup;
use App\Controllers\Calendar;
use App\Controllers\Profile;
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
/*
* Get Value routes below
* For routing pages that pass get values
*/
// Example: $routes->get('/admin/(:segment)/(:segment)', [Home::class, 'some function to handle values'])
/* Form route area */
$routes->get('/account/signup', [Signup::class, 'index']);
$routes->get('/account/login', [Login::class, 'index']);
$routes->post('/signup/step2', [Signup::class, 'step1']);
$routes->post('/signup/step3', [Signup::class, 'step2']);
$routes->post('/signup/finish', [Signup::class, 'step3']);

/* Form route area for calendar */
$routes->get('/calendar/index', [Calendar::class, 'index']);
$routes->post('/calendar/step1', [Calendar::class, 'step1']);
$routes->post('/calendar/step2', [Calendar::class, 'step2']);

/* Routes for User login */
$routes->get('account/login', [Login::class, 'index']);
$routes->post('login/user', [Login::class, 'login']);

/* Routes for user Account Create */
$routes->get('account/signup', [Signup::class, 'index']);
$routes->post('signup/step2', [Signup::class, 'step1']);
$routes->post('signup/step3', [Signup::class, 'step2']);
$routes->post('signup/finish', [Signup::class, 'step3']);

/* Routes for the user profile */
$routes->get('user/profile', [Profile::class, 'index']);
$routes->get('user/view', [Profile::class, 'viewProfile']);
$routes->get('user/editProfile', [Profile::class, 'editProfile']);
$routes->get('user/editPass', [Profile::class, 'editPass']);