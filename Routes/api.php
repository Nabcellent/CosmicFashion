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
        $routes->get('/(:segment)', 'UserController::show/$1');
        $routes->put('/(:segment)', 'UserController::update/$1');
    });

    $routes->group('products', function($routes) {
        $routes->get('/', 'ProductController::index');
        $routes->get('(:num)', 'ProductController::show/$1');
        $routes->get('user/(:num)', 'ProductController::userProducts/$1', ['filter' => 'oauth']);
        $routes->get('sales-volume', 'ProductController::salesVolume', ['filter' => 'oauth']);
    });
});
