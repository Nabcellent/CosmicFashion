<?php

use Config\Services;

$routes = Services::routes();

$routes->group('/api', ['namespace' => 'App\Controllers\API'], function ($routes) {
    $routes->get('demo', 'UserController::index');
});