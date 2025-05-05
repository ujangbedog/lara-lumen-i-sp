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

//test from folder
$router->group(['namespace' => 'Coba'], function () use ($router) {
    $router->get('/coba', 'CobaController@index');
});

//Latihan 1
$router->group(['namespace' => 'Latihan1'], function () use ($router) {
    $router->get('/hello-lumen', function () {
        return "<h1>Lumen</h1><p>Hi good developer, thank for using Lumen</p>";
    });
    $router->get('/hello-lumen/{name}', function ($name) {
        return "<h1>Lumen</h1><p>Hi <b>" . $name . "</b>, thank for using Lumen</p>";
    });
    $router->get('/scores', ['middleware' => 'login', function () {
        return "<h1>Selamat!</h1><p>Nilai anda 100</p>";
    }]);
    $router->get('/users', 'UsersController@index');
    $router->get('/users/{id}', 'UsersController@show');
    $router->get('/books', 'BookController@index');
    $router->get('/cities', 'CityController@index');
    $router->get('/profile/{id}', 'ProfileController@show');
    $router->get('/status', 'SystemController@status');
    $router->get('/secure-data', ['middleware' => 'apikey', 'uses' => 'SecureDataController@index']);
});

//Latihan 2
$router->group(['namespace' => 'Latihan2'], function () use ($router) {
    $router->get('/posts', 'PostController@index');
    $router->get('/articles', 'ArticleController@index');
    $router->get('/articles/{id}', 'ArticleController@show');
    $router->post('/articles', 'ArticleController@store');
    $router->get('/authors', 'AuthorController@index');
    $router->get('/categories', 'CategoryController@index');
    $router->get('/comments', 'CommentController@index');
    $router->get('/tags', 'TagController@index');
});
