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

$router->get('/', 'HomeController@index');

$router->get('/hello-lumen/{name}', function ($name) {
    return "<h1>Lumen</h1><p>Hi <b>" . $name . "</b>, thank for using Lumen</p>";
});

$router->get('/scores', ['middleware' => 'login', function () {
    return "<h1>Selamat!</h1><p>Nilai anda 100</p>";
}]);

$router->get('/users', 'UsersController@index');
$router->get('/users/{id}', 'UsersController@show');

//Latihan 1
$router->get('/books', 'BookController@index');
$router->get('/cities', 'CityController@index');
$router->get('/profile/{id}', 'ProfileController@show');
$router->get('/status', 'SystemController@status');
$router->get('/secure-data', ['middleware' => 'apikey', 'uses' => 'SecureDataController@index']);

//Latihan 2
$router->get('/posts', 'PostController@index');
