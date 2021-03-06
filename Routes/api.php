<?php

use Config\Services;

$routes = Services::routes();

$routes->group('/api', ['namespace' => 'App\Controllers\API'], function($routes) {
    $routes->group('auth', function($routes) {
        $routes->post('login', 'AuthController::login', ['as' => 'api.login']);
        $routes->post('register', 'AuthController::register', ['as' => 'api.register']);
    });

    $routes->group('users', function($routes) {
        $routes->get('/', 'UserController::index');
        $routes->post('/', 'UserController::create');
        $routes->get('(:segment)', 'UserController::show/$1');
        $routes->put('(:num)', 'UserController::update/$1');
        $routes->delete('(:num)', 'UserController::delete/$1');
    });

    $routes->group('products', function($routes) {
        $routes->get('/', 'ProductController::index');
        $routes->get('(:num)', 'ProductController::show/$1', ['filter' => 'basic_auth']);
        $routes->get('user/(:num)', 'ProductController::userProducts/$1', ['filter' => 'oauth']);
        $routes->get('sales-volume', 'ProductController::salesVolume', ['filter' => 'oauth']);
    });

    $routes->group('transactions', function($routes) {
        $routes->get('/', 'TransactionController::index');
        $routes->get('(:num)', 'TransactionController::show/$1');
        $routes->get('user/(:num)', 'TransactionController::userProducts/$1');
        $routes->get('sales-volume', 'TransactionController::salesVolume');
    });
});
