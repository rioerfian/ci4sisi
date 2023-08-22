<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Dashboard::index');

$routes->get('/login', 'User::login');
$routes->post('/login', 'User::login_process');
$routes->get('/register', 'User::register');
$routes->post('/register', 'User::save');
$routes->post('/profile', 'User::update');
$routes->get('/logout', 'User::logout');
$routes->get('/profile', 'User::profile');

$routes->get('/user', 'Admin::showUser');
$routes->post('/user/add', 'Admin::addUser');
$routes->get('/user/delete/(:segment)', 'Admin::deleteUser/$1');

$routes->get('/user/edit/(:segment)', 'Admin::editUser/$1');
$routes->post('/user/edit/(:segment)', 'Admin::saveUser/$1');
$routes->get('/sppd/edit/(:segment)', 'Admin::editSppd/$1');
$routes->post('/sppd/edit/(:segment)', 'Admin::saveSppd/$1');
$routes->get('/payroll/edit/(:segment)', 'Admin::editPayroll/$1');
$routes->post('/payroll/edit/(:segment)', 'Admin::savePayroll/$1');
$routes->get('/attendance/edit/(:segment)', 'Admin::editAttendance/$1');
$routes->post('/attendance/edit/(:segment)', 'Admin::saveAttendance/$1');
$routes->get('/employee/edit/(:segment)', 'Admin::editEmployee/$1');
$routes->post('/employee/edit/(:segment)', 'Admin::saveEmployee/$1');

$routes->get('/employee', 'Admin::showEmployee');
$routes->post('/employee/add', 'Admin::addEmployee');
$routes->get('/employee/delete/(:segment)', 'Admin::deleteEmployee/$1');


$routes->get('/payroll', 'Admin::showPayroll');
$routes->post('/payroll/add', 'Admin::addPayroll');
$routes->get('/payroll/delete/(:segment)', 'Admin::deletePayroll/$1');

$routes->get('/sppd', 'Admin::showSppd');
$routes->post('/sppd/add', 'Admin::addSppd');
$routes->get('/sppd/delete/(:segment)', 'Admin::deleteSppd/$1');

$routes->get('/attendance', 'Admin::showAttendance');
$routes->post('/attendance/add', 'Admin::addAttendance');
$routes->get('/attendance/delete/(:segment)', 'Admin::deleteAttendance/$1');

$routes->get('/log', 'Admin::showLog');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
