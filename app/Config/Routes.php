<?php

use App\Controllers\Admin;
use App\Controllers\Home;
use App\Controllers\Login;
use App\Controllers\Signup;
use App\Controllers\Calendar;
use App\Controllers\Reserve;
use App\Controllers\MyReservation;
use App\Controllers\Profile;
use CodeIgniter\Router\RouteCollection;
use Config\App;

/**
 * @var RouteCollection $routes
 */
/* Landing Routes 
* Add routes that direct to static or non-action pages
* Non-action == Does not require data or values to be passed on
*/
$routes->get('/', [Home::class, 'index']);
$routes->get('(:segment)', [Home::class, 'user']);
$routes->get('/termsandservices/view', [Home::class, 'terms']);
$routes->get('/admin/(:segment)', [Admin::class, 'admin']);
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

/* Form route area for calendar */
$routes->get('/calendar/index', [Calendar::class, 'index']);
$routes->post('/calendar/back', [Calendar::class, 'back']);
$routes->post('/calendar/step1', [Calendar::class, 'step1']);
$routes->post('/calendar/step2', [Calendar::class, 'step2']);
$routes->post('/calendar/step3', [Calendar::class, 'step3']);
$routes->post('/calendar/step4', [Calendar::class, 'step4']);

/* Form route area for reserve */
$routes->get('/reserve/check', [Reserve::class, 'checkLogin']);
$routes->get('/reserve/index', [Reserve::class, 'index']);
$routes->post('/reserve/back', [Reserve::class, 'back']);
$routes->post('/reserve/wedding', [Reserve::class, 'resWedding']);
$routes->post('/reserve/baptism', [Reserve::class, 'resBaptism']);
$routes->post('/reserve/funeral', [Reserve::class, 'resFuneral']);
$routes->post('/reserve/massintention', [Reserve::class, 'resMassintention']);
$routes->post('/reserve/blessing', [Reserve::class, 'resBlessing']);
$routes->post('/reserve/docureq', [Reserve::class, 'resDocument']);

//Form route are for my reservation
$routes->get('/myreservation/index', [MyReservation::class, 'checkLogin']);
$routes->get('/myreservation/status/(:segment)', [MyReservation::class, 'getStatus']);
$routes->post('/myreservation/cancel', [MyReservation::class, 'cancelReserve']);


/* Routes for User login */
$routes->get('account/login', [Login::class, 'index']);
$routes->post('login/user', [Login::class, 'login']);
/* For admin login */
$routes->post('login/admin', [Login::class, 'admin']);

/* Routes for the user profile */
$routes->get('user/profile', [Profile::class, 'index']);
$routes->get('user/view', [Profile::class, 'viewProfile']);
$routes->add('user/editProfile', [Profile::class, 'editProfile'], ['get','post']);
$routes->add('user/editPass', [Profile::class, 'editPass'], ['get', 'post']);
$routes->add('user/delAcc', [Profile::class, 'deleteAcc'], ['get', 'post']);

/* Admin Routing */
$routes->get('admin/records/(:segment)', [Admin::class, 'viewRecords']);
$routes->get('admin/records/(:segment)/(:segment)', [Admin::class, 'viewRecords']);
$routes->post('admin/records/(:segment)', [Admin::class, 'getName']);
$routes->post('admin/records/(:segment)/add', [Admin::class, 'addRec']);
$routes->post('admin/records/(:segment)/edit', [Admin::class, 'editRec']);

$routes->get('/admin/reservations/status/(:segment)', [Admin::class, 'getStatus']);
$routes->post('/admin/reservations/update', [Admin::class, 'updateReserve']);

/* Post request for adding announcement and editing existing */
$routes->post('/admin/announcements/add', [Admin::class, 'addItem']);
$routes->post('/admin/announcements/delete', [Admin::class, 'delItem']);
$routes->post('/admin/announcements/edit', [Admin::class, 'editItem']);

/* Post request for adding faqs and editing existing */
$routes->post('/admin/faqs/add', [Admin::class, 'addfaqItem']);
$routes->post('/admin/faqs/delete', [Admin::class, 'delfaqItem']);
$routes->post('/admin/faqs/edit', [Admin::class, 'editfaqItem']);

