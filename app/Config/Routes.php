<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('dashboard');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'dashboard::index');
$routes->get('/my-account', 'My_account::index');
$routes->get('/my-account/saved-vacancy', 'My_account::savedVacancy');
$routes->get('/my-account/my-application', 'My_account::myApplication');
$routes->get('/my-account/profile', 'My_account::profile');
$routes->get('/my-account/profile/edit', 'My_account::viewProfileEdit');

$routes->get('/register', 'Front_end::viewRegister');
$routes->get('/verification', 'Front_end::verification');
$routes->get('/activation', 'Front_end::activation');
//$routes->get('personal/individual_score_card', '\personal\Individual_score_card::index');
//$routes->get('personal/individual_score_card/(:any)', '\personal\individual_score_card::detail_form/$1');
//$routes->get('personal/score_card/add_form', 'personal/Score_card::add_form');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
