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
$routes->get('/Achats', 'AchatController::index');