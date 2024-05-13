<?php

use App\Controllers\Home;
use App\Controllers\Login;
use App\Controllers\Signup;
use App\Controllers\Calendar;
use App\Controllers\Reserve;
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
/* For signup */
$routes->get('/account/signup', [Signup::class, 'index']);
$routes->get('/account/login', [Login::class, 'index']);
$routes->post('/signup/step2', [Signup::class, 'step1']);
$routes->post('/signup/step3', [Signup::class, 'step2']);
$routes->post('/signup/finish', [Signup::class, 'step3']);

/* Form route area for calendar and reserve */
$routes->get('/calendar/index', [Calendar::class, 'index']);
$routes->post('/calendar/step1', [Calendar::class, 'step1']);
$routes->post('/calendar/step2', [Calendar::class, 'step2']);
$routes->post('/calendar/step3', [Calendar::class, 'step3']);

$routes->get('/reserve/index', [Reserve::class, 'index']);
$routes->post('/reserve/back', [Reserve::class, 'back']);
$routes->post('/reserve/wedding', [Reserve::class, 'resWedding']);
$routes->post('/reserve/baptism', [Reserve::class, 'resBaptism']);
$routes->post('/reserve/funeral', [Reserve::class, 'resFuneral']);
$routes->post('/reserve/massintention', [Reserve::class, 'resMassintention']);
$routes->post('/reserve/blessing', [Reserve::class, 'resBlessing']);


/* Routes for User login */
$routes->get('account/login', [Login::class, 'index']);
$routes->post('login/user', [Login::class, 'login']);

/* Routes for the user profile */
$routes->get('user/profile', [Profile::class, 'index']);
$routes->get('user/view', [Profile::class, 'viewProfile']);
$routes->add('user/editProfile', [Profile::class, 'editProfile'], ['get','post']);
$routes->add('user/editPass', [Profile::class, 'editPass'], ['get', 'post']);
$routes->add('user/delAcc', [Profile::class, 'deleteAcc'], ['get', 'post']);