<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');

    $router->get('/api/users', 'UserController@getUser' );

    $router->resource('users', UserController::class);

    $router->resource('products', ProductController::class);

    $router->resource('payments', PaymentController::class);

    $router->resource('serials', SerialController::class);

});
