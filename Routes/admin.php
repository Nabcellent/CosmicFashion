<?php

use Config\Services;

$routes = Services::routes();

$routes->group('/admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'admin'], function($routes) {
    $routes->get('/', "DashboardController", ['as' => "dashboard"]);
    $routes->get('dash-stats', "DashboardController::dashStats", ['as' => "dashboard.stats"]);

    //  CATEGORY ROUTES
    $routes->group('categories', function($routes) {
        $routes->get('/', 'CategoryController', ['as' => 'admin.category.index']);
        $routes->get('create', 'CategoryController::create', ['as' => 'admin.category.create']);
        $routes->post('store', 'CategoryController::store', ['as' => 'admin.category.store']);
        $routes->get('show/(:num)', 'CategoryController::show/$1', ['as' => 'admin.categories.show']);
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
        $routes->get('show/(:num)', 'ProductController::show/$1', ['as' => 'admin.products.show']);
        $routes->get('edit/(:num)', 'ProductController::edit/$1', ['as' => 'admin.products.edit']);
        $routes->put('update/(:num)', 'ProductController::update/$1', ['as' => 'admin.product.update']);
        $routes->get('purchases-chart/(:num)', 'ProductController::dailyPurchases/$1',
            ['as' => 'admin.product.purchases.chart']);
    });

    //  USER ROUTES
    $routes->group('users', function($routes) {
        $routes->get('/', 'UserController', ['as' => 'admin.user.index']);
        $routes->get('create', 'UserController::create', ['as' => 'admin.user.create']);
        $routes->post('store', 'UserController::store', ['as' => 'admin.user.store']);
        $routes->get('profile/(:num)', 'UserController::show/$1', ['as' => 'admin.user.profile']);
        $routes->get('edit/(:num)', 'UserController::edit/$1', ['as' => 'admin.user.edit']);
        $routes->put('update/(:num)', 'UserController::update/$1', ['as' => 'admin.user.update']);
        $routes->get('purchases-chart/(:num)', 'UserController::userStats/$1', ['as' => 'admin.users.orders.chart']);
    });

    //  ORDER ROUTES
    $routes->group('orders', function($routes) {
        $routes->get('/', 'OrderController', ['as' => 'admin.orders.index']);
        $routes->get('show/(:num)', 'OrderController::show/$1', ['as' => 'admin.orders.show']);
        $routes->get('edit/(:num)', 'OrderController::edit/$1', ['as' => 'admin.orders.edit']);
        $routes->put('update/(:num)', 'OrderController::update/$1', ['as' => 'admin.orders.update']);
        $routes->get('orders-chart/(:num)', 'OrderController::dailyPurchases/$1',
            ['as' => 'admin.orders.purchases.chart']);
    });

    $routes->group('payments', function($routes) {
        $routes->post('stk_requests', 'PaymentController::initiateStkPush');
        $routes->get('stk_status/(:segment)', 'PaymentController::stkStatus/$1');
        $routes->post('paypal-callback', 'PaymentController::paypalCallback');
    });

    $routes->group('analytics', function($routes) {
        $routes->get('/', 'AnalyticController::index', ['as' => 'admin.stats.index']);
        $routes->get('fetch', 'AnalyticController::init', ['as' => 'admin.stats.init']);
    });
});

$routes->get('/check-email', 'UserController::checkEmailExists');
$routes->delete('/delete-resource', 'AjaxController::destroy');