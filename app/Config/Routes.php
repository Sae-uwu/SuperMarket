<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

/* IMPORT / EXPORT CSV */

//Upload Formulaire
$routes->get('/import', 'ImportController::index');
$routes->post('/import/upload', 'ImportController::upload');