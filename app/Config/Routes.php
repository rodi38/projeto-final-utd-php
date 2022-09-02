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
$routes->setDefaultController('Dashboard');
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

# Rotas do módulo de Dashboard
$routes->get('/', 'Dashboard::index'); 


# Rotas de Livros
$routes->get('/livros/listar',"LivrosController::listar");
$routes->get('/livros/inserir',"LivrosController::form");
$routes->get('/livros/editar/(:any)',"LivrosController::form/$1/");
$routes->get('/livros/delete/(:num)',"LivrosController::delete/$1");
$routes->post('/livros/salvar',"LivrosController::save");


# Usuários 
$routes->get('/usuarios/lista',"UsuariosController::lista");
$routes->get('/usuarios/adicionar',"UsuariosController::adicionar");
$routes->get('/usuarios/delete/(:num)',"UsuariosController::delete/$1");


# Rotas do módulo de Perfil
$routes->get('/perfil', 'PerfilController::index');

//ROTAS DE SISTEMA
$routes->get('/logout', 'LoginController::logout'); 
$routes->post('/logar', 'LoginController::logar'); 
$routes->get('/logar', 'LoginController::logar'); 

//$routes->get('datatables', 'Site::generateDatatable');
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
