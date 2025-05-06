<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', 'HomeController@index');

// Test dari folder "Coba"
$router->group(['namespace' => 'Coba'], function () use ($router) {
    $router->get('/coba', 'CobaController@index');
});

// Latihan 1
$router->group(['prefix' => 'latihan1', 'namespace' => 'Latihan1'], function () use ($router) {
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

//Group Latihan 2
$router->group(['prefix' => 'latihan2', 'namespace' => 'Latihan2'], function () use ($router) {
    $router->get('/posts', 'PostController@index');
    $router->get('/articles', 'ArticleController@index');
    $router->get('/articles/{id}', 'ArticleController@show');
    $router->post('/articles', 'ArticleController@store');
    $router->get('/authors', 'AuthorController@index');
    $router->get('/categories', 'CategoryController@index');
    $router->get('/comments', 'CommentController@index');
    $router->get('/tags', 'TagController@index');
});

//Group Latihan 3
$router->group(['prefix' => 'latihan3', 'namespace' => 'Latihan3'], function () use ($router) {
    $router->get('/posts', 'PostController@index');
    $router->post('/posts', 'PostController@store');
    $router->get('/post/{id}', 'PostController@show');
    $router->put('/post/{id}', 'PostController@update');
    $router->delete('/post/{id}', 'PostController@destroy');

    //latihan
    $router->get('/products', 'ProductController@index');
    $router->post('/products', 'ProductController@store');
    $router->get('/product/{id}', 'ProductController@show');
    $router->put('/product/{id}', 'ProductController@update');
    $router->delete('/product/{id}', 'ProductController@destroy');
});
