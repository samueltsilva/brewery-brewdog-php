<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

//Login
$router->post(
    'login',
    ['uses' => 'LoginController@login', 'as' => 'login']
);

$router->get(
    'user[/{idUsers}{username}]',
    ['uses' => 'GetUserController@get', 'as' => 'user/get']
);
$router->post(
    'user',
    ['uses' => 'CreateUserController@create', 'as' => 'user/create']
);
$router->put(
    'user',
    ['uses' => 'UpdateUserController@update', 'as' => 'user/update']
);
$router->delete(
    'user',
    ['uses' => 'DeleteUserController@delete', 'as' => 'user/delete']
);

$router->get(
    'beers',
    ['middleware' => 'auth', 'uses' => 'BeersController@get', 'as' => 'beers/get']
);





