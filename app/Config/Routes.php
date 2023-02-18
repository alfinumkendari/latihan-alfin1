<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
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
$routes->get('/', 'Auth::index');
$routes->get('/home', 'Home::index');
$routes->get('/pagem', 'Pagem::index');
$routes->get('/logout/pagem', 'Pagem::logout');
$routes->get('/pagep', 'Pagep::index');
$routes->get('/logout/pagep', 'Pagep::logout');

// routes masyarakat
$routes->get('/masyarakat', 'Masyarakat::index');
$routes->post('/save/masyarakat', 'Masyarakat::save');
$routes->post('/update/masyarakat/(:segment)', 'Masyarakat::update/$1');
$routes->post('/delete/masyarakat/(:any)', 'Masyarakat::delete/$1');

// routes Petugas
$routes->get('/petugas', 'Petugas::index');
$routes->post('/save/petugas', 'Petugas::save');
$routes->post('/update/petugas/(:segment)', 'Petugas::update/$1');
$routes->post('/delete/petugas/(:any)', 'Petugas::delete/$1');

// routes pengaduan
$routes->get('/pengaduan', 'Pengaduan::index');

// routes Tanggapan
$routes->get('/tanggapan', 'Tanggapan::index');

// routes Auth
$routes->get('/auth/login', 'Auth::logout');
$routes->get('/auth/loginm', 'Auth::page_m');
$routes->post('/save/login', 'Auth::login');
$routes->post('/save/loginm', 'Auth::loginm');
$routes->get('/page/register', 'Auth::registerp');
$routes->get('/hal/register', 'Auth::registerm');
$routes->post('/save/register', 'Auth::simpan');
$routes->post('/save/registerm', 'Auth::save');

// Tanggapan Petugas
$routes->get('/pagep', 'Pagep::index');
$routes->get('/profilep', 'Pagep::profile');
$routes->get('/tanggap', 'Pagep::tanggap');
$routes->post('/save/tanggapan', 'Pagep::savep');

// Aduan Masyarakat
$routes->get('/pagem', 'Pagem::index');
$routes->get('/aduan', 'Pagem::aduan');
$routes->get('/profilem', 'Pagem::profile');
$routes->post('/save/aduan', 'Pagem::savem');

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
