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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Register::index');
$routes->get('/login', 'Login::index');

$routes->get('forgot-password', 'PasswordReset::forgotPassword');
$routes->get('reset_form/(:segment)', 'PasswordReset::reset_form/$1');
$routes->post('password/reset', 'PasswordReset::resetPassword');
$routes->post('password/save', 'PasswordReset::save', ['as' => 'password.save']);
$routes->get('/check_email', 'PasswordReset::checkEmail');
$routes->get('/admin-login', 'AdminLoginController::index');


$routes->get('/vendor_registration', 'VendorController::index');
$routes->post('/vendor_registration', 'VendorController::register');

$routes->get('admin_dashboard', 'Dashboard::dashboard');

$routes->get('admin/notifications', 'Admin::notifications');
$routes->post('admin/handle-registration/(:num)/(:segment)', 'Admin::handleRegistration/$1/$2');
$routes->get('admin', 'Admin::index');

$routes->get('admin/accept/(:num)', 'Admin::accept/$1');
$routes->get('admin/deny/(:num)', 'Admin::deny/$1');

$routes->post('/admin/delete_user', 'Admin::delete_user');
$routes->get('/admin/viewusers', 'Admin::viewUsers');





$routes->get('/vendor_registration', 'VendorController::index');
$routes->post('/vendor_registration', 'VendorController::register');

$routes->get('admin_dashboard', 'Dashboard::dashboard');

$routes->get('admin/notifications', 'Admin::notifications');
$routes->post('admin/handle-registration/(:num)/(:segment)', 'Admin::handleRegistration/$1/$2');
$routes->get('admin', 'Admin::index');

$routes->get('admin/accept/(:num)', 'Admin::accept/$1');
$routes->get('admin/deny/(:num)', 'Admin::deny/$1');



$routes->get('/vendor_registration', 'VendorController::index');
$routes->post('/vendor_registration', 'VendorController::register');
$routes->get('vendor_dashboard', 'VendorController::vendor');

$routes->get('admin_dashboard', 'Dashboard::dashboard');

$routes->get('admin/notifications', 'Admin::notifications');
$routes->post('admin/handle-registration/(:num)/(:segment)', 'Admin::handleRegistration/$1/$2');

$routes->get('admin', 'Admin::index');
$routes->get('admin/accept/(:num)', 'Admin::accept/$1');
$routes->get('admin/deny/(:num)', 'Admin::deny/$1');

$routes->post('post', 'Post::add_product');

$routes->get('/admin/products', 'Admin::viewProducts');
$routes->get('admin/delete_product/(:num)', 'Admin::deleteProduct/$1');





//$routes->post('/', 'Auth::index');
//$routes->post('/', 'Log::index');




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
