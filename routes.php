<?php

return [
    //dashboard
    '/' => 'DashboardController@index',

    //inventory
    '/inventory' => 'InventoryController@index',
    '/inventory/show' => 'InventoryController@show',
    '/inventory/create' => 'InventoryController@create',
    '/inventory/store' => 'InventoryController@store',
    '/inventory/edit' => 'InventoryController@edit',
    '/inventory/update' => 'InventoryController@update',
    '/inventory/destroy' => 'InventoryController@destroy',

    // Products
    '/products' => 'ProductsController@index',
    '/products/show' => 'ProductsController@show',
    '/products/create' => 'ProductsController@create',
    '/products/store' => 'ProductsController@store',
    '/products/edit' => 'ProductsController@edit',
    '/products/update' => 'ProductsController@update',
    '/products/destroy' => 'ProductsController@destroy',

    //auth
    '/login' => 'AuthController@login',
    '/register' => 'AuthController@register',
    '/logout' => 'AuthController@logout',
    '/authenticate' => 'AuthController@authenticate',
    '/registerUser' => 'AuthController@registerUser',

    //users
    '/users' => 'UsersController@index',
    '/users/show' => 'UsersController@show',
    '/users/create' => 'UsersController@create',
    '/users/store' => 'UsersController@store',
    '/users/update' => 'UsersController@update',
    '/users/destroy' => 'UsersController@destroy',

    //orders
    '/orders' => 'OrdersController@index',
    '/orders/show' => 'OrdersController@show',
    '/orders/store' => 'OrdersController@store',

    //reports
    '/reports' => 'ReportsController@index',
    '/repotts/export' => 'ReportsController@export',
    '/reports/show' => 'ReportsController@show',




];