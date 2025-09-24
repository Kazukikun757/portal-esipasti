<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Admin routes
$routes->group('admin', function ($routes) {
    $routes->get('menu', 'Admin\MenuController::index');
    $routes->get('menu/create', 'Admin\MenuController::create');
    $routes->post('menu/store', 'Admin\MenuController::store');
    $routes->get('menu/edit/(:num)', 'Admin\MenuController::edit/$1');
    $routes->post('menu/update/(:num)', 'Admin\MenuController::update/$1');
    $routes->get('menu/delete/(:num)', 'Admin\MenuController::delete/$1');
});
