<?php

use Config\Services;

$routes = Services::routes();

$routes->group('/api', ['namespace' => 'App\Controllers\API'], function ($routes) {
    $routes->get('demo', 'UserController::index');

    $routes->group('user', function($routes) {
        $routes->post('register', 'UserController::store', ['as' => 'api.user.store']);
    });
});
