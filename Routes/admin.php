<?php

use Config\Services;

$routes = Services::routes();

$routes->group('/admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'admin'], function ($routes) {
    $routes->get('/', "DashboardController::index", ['as' => "dashboard"]);
});