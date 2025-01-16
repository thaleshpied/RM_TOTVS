<?php

use CodeIgniter\Router\RouteCollection;

$routes->set404Override('App\Controllers\Work::page_error_404');

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
$routes->get('/', 'Work::index');
$routes->get('index', 'Work::index');