<?php

use Config\Services;

$routes = Services::routes();

$routes->group('/admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'admin'], function ($routes) {
    $routes->get('/', "DashboardController", ['as' => "dashboard"]);

    //  CATEGORY ROUTES
    $routes->group('categories', function($routes) {
        $routes->get('/', 'CategoryController', ['as' => 'admin.category.index']);
        $routes->get('create', 'CategoryController::create', ['as' => 'admin.category.create']);
        $routes->post('store', 'CategoryController::store', ['as' => 'admin.category.store']);
        $routes->get('edit/(:num)', 'CategoryController::edit/$1', ['as' => 'admin.category.edit']);
        $routes->put('update/(:num)', 'CategoryController::update/$1', ['as' => 'admin.category.update']);
    });

    //  SUB CATEGORY ROUTES
    $routes->group('sub-categories', function($routes) {
        $routes->get('/', 'SubCategoryController', ['as' => 'admin.subcategory.index']);
        $routes->get('create', 'SubCategoryController::create', ['as' => 'admin.subcategory.create']);
        $routes->post('store', 'SubCategoryController::store', ['as' => 'admin.subcategory.store']);
        $routes->get('edit/(:num)', 'SubCategoryController::edit/$1', ['as' => 'admin.subcategory.edit']);
        $routes->put('update/(:num)', 'SubCategoryController::update/$1', ['as' => 'admin.subcategory.update']);
    });

    //  PRODUCT ROUTES
    $routes->group('products', function($routes) {
        $routes->get('/', 'ProductController', ['as' => 'admin.product.index']);
        $routes->get('create', 'ProductController::create', ['as' => 'admin.product.create']);
        $routes->post('store', 'ProductController::store', ['as' => 'admin.product.store']);
    });

    //  USER ROUTES
    $routes->group('users', function($routes) {
        $routes->get('/', 'UserController', ['as' => 'admin.user.index']);
        $routes->get('create', 'UserController::create', ['as' => 'admin.user.create']);
        $routes->post('store', 'UserController::store', ['as' => 'admin.user.store']);
    });
});

$routes->get('/check-email', 'UserController::checkEmailExists');
$routes->delete('/delete-resource', 'AjaxController::destroy');