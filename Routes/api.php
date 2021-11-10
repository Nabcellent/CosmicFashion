<?php

use Config\Services;

$routes = Services::routes();

$routes->group('/api', ['namespace' => 'App\Controllers\API'], function ($routes) {
    $routes->group('auth', function($routes) {
        $routes->post('login', 'AuthController::login', ['as' => 'api.login']);
        $routes->post('register', 'AuthController::store', ['as' => 'api.store']);
    });

    $routes->resource('users', ['controller' => 'UserController']);
    $routes->resource('products', ['controller' => 'ProductController']);
});
