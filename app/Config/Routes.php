<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'CaisseController::afficherCaisse');
$routes->post('/caisse/valider', 'CaisseController::sauvegarderCaisse');
$routes->get('/achats', 'AchatController::index');

$routes->get('/import', 'ImportController::index');
$routes->post('/import/upload', 'ImportController::upload');

$routes->get('/achat', 'AchatController::index');
$routes->post('/achat/enregistrer', 'AchatController::enregistrer');