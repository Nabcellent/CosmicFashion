<?php

use Config\Services;

$routes = Services::routes();

$routes->group('/admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'admin'], function ($routes) {
    $routes->get('/', "DashboardController::index", ['as' => "dashboard"]);

    //  CATEGORY ROUTES
    $routes->group('categories', function($routes) {
        $routes->get('/', 'CategoryController::index', ['as' => 'admin.category.index']);
        $routes->get('create', 'CategoryController::create', ['as' => 'admin.category.create']);
        $routes->post('store', 'CategoryController::store', ['as' => 'admin.category.store']);
    });

    //  SUB CATEGORY ROUTES
    $routes->group('sub-categories', function($routes) {
        $routes->get('/', 'SubCategoryController::index', ['as' => 'admin.subcategory.index']);
        $routes->get('create', 'SubCategoryController::create', ['as' => 'admin.subcategory.create']);
        $routes->post('store', 'SubCategoryController::store', ['as' => 'admin.subcategory.store']);
    });

    //  PRODUCT ROUTES
    $routes->group('products', function($routes) {
        $routes->get('/', 'ProductController::index', ['as' => 'admin.product.index']);
        $routes->get('create', 'ProductController::create', ['as' => 'admin.product.create']);
    });

    //  USER ROUTES
    $routes->group('users', function($routes) {
        $routes->get('/', 'UserController::index', ['as' => 'admin.user.index']);
        $routes->get('create', 'UserController::create', ['as' => 'admin.user.create']);
    });
});

$routes->get('/check-email', 'UserController::checkEmailExists');