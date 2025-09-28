<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Authentication Routes
$routes->group('', ['namespace' => 'App\Controllers'], function ($routes) {
    // Login routes
    $routes->get('login', 'AuthController::login');
    $routes->post('login', 'AuthController::doLogin');

    // Register routes
    $routes->get('register', 'AuthController::register');
    $routes->post('register', 'AuthController::doRegister');

    // Logout route
    $routes->get('logout', 'AuthController::logout');

    // Profile routes
    $routes->get('profile', 'AuthController::profile');
    $routes->post('profile', 'AuthController::updateProfile');
});

// Admin routes
$routes->group('admin', function ($routes) {
    $routes->get('menu', 'Admin\MenuController::index');
    $routes->get('menu/create', 'Admin\MenuController::create');
    $routes->post('menu/store', 'Admin\MenuController::store');
    $routes->get('menu/edit/(:num)', 'Admin\MenuController::edit/$1');
    $routes->post('menu/update/(:num)', 'Admin\MenuController::update/$1');
    $routes->get('menu/delete/(:num)', 'Admin\MenuController::delete/$1');
    $routes->post('menu/update-order', 'Admin\MenuController::updateOrder');
});
