<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::login');
$routes->post('/signin', 'Auth::signIn');
$routes->get('/register', 'Auth::register');
$routes->post('/signup', 'Auth::signUp');

$routes->get('/logout', 'Auth::logout');
$routes->get('/Caisse', 'CaisseController::afficherCaisse');
$routes->post('/caisse/valider', 'CaisseController::sauvegarderCaisse');
$routes->get('/achats', 'AchatController::index');

$routes->get('/import', 'ImportController::index');
$routes->post('/import/upload', 'ImportController::upload');

$routes->get('/achat', 'AchatController::index');
// $routes->post('/achat/enregistrer', 'AchatController::enregistrer');

$routes->post('/achat/ajouter', 'AchatController::ajouter');
$routes->post('/achat/cloturer', 'AchatController::cloturer');