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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get("getuser", "Profile::getuser");

$routes->resource('api/post', ['controller' => 'Post']);
$routes->resource('api/penelitian', ['controller' => 'Penelitian']);
$routes->resource('api/bimbinganta', ['controller' => 'BimbinganTa']);
$routes->resource('api/sertifikatdosen', ['controller' => 'SertifikatDosen']);
$routes->resource('api/serkom', ['controller' => 'SertifikatKompetensi']);
$routes->resource('api/detildosen', ['controller' => 'DetilDosen']);
$routes->resource('api/ripendosen', ['controller' => 'RipenDosens']);
$routes->resource('api/rekogdosen', ['controller' => 'RekogDosen']);
$routes->resource('api/dostep', ['controller' => 'DosenTetap']);
$routes->resource('api/nodostep', ['controller' => 'DosenTidakTetap']);
$routes->resource('api/produkdosen', ['controller' => 'ProdukDosenAdop']);
$routes->resource('api/luarandosen', ['controller' => 'AllLuaranDosen']);
$routes->resource('api/luarandosenhkia', ['controller' => 'LuarannyaDosen']);
$routes->resource('api/luarandosenhkib', ['controller' => 'LuarannyaDosenn']);
$routes->resource('api/luarandosenteknologi', ['controller' => 'LuarannyaDosennn']);
$routes->resource('api/luarandosenbuku', ['controller' => 'LuarannyaDosennnn']);
$routes->resource('api/mahasiswa', ['controller' => 'Mahasiswa']);
$routes->resource('api/matakuliah', ['controller' => 'MataKuliah']);
$routes->resource('api/kepuasanmahasiswa', ['controller' => 'KepuasanMahasiswa']);
$routes->resource('api/prodi', ['controller' => 'ProgramStudi']);
$routes->resource('api/capaiankurikulum', ['controller' => 'CapaianKurikulum']);
$routes->resource('api/pkm', ['controller' => 'Pkm']);






// Prodi
$routes->resource('api/prodi', ['controller' => 'Prodi']);
$routes->resource('api/ipk', ['controller' => 'IpkMhs']);

// PersentaseKepuasaan
$routes->resource('api/persentasekp', ['controller' => 'PersentasekpController']);

// KepuasanLLS
$routes->resource('api/kepuasanlls', ['controller' => 'KepuasanLLSController']);

$routes->group("api", function ($routes) {
    $routes->post("register", "Register::index");
    $routes->get("profiledosen", "ProfileDosen::index");
    $routes->post("login", "Login::index");
    $routes->get("profile", "Profile::index", ['filter' => 'authFilter']);
    $routes->get("users", "Users::index", ['filter' => 'authFilter']);
});
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
