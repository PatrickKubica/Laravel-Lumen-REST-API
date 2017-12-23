<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Add routes for Products
$router->group(['prefix' => 'api/v1'], function($router)
{
    $router->post('product','ProductController@createProduct');
    $router->put('product/{id}','ProductController@updateProduct'); 	 
    $router->delete('product/{id}','ProductController@deleteProduct');
    $router->get('product','ProductController@index');
});
