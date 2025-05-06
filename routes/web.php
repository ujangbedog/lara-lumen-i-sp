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

//UTS
$router->group(['prefix' => 'uts', 'namespace' => 'Uts'], function () use ($router) {
    $router->get('/customers', 'CustomerController@index');
    $router->post('/customers', 'CustomerController@store');
    $router->get('/customer/{id}', 'CustomerController@show');
    $router->put('/customer/{id}', 'CustomerController@update');
    $router->delete('/customer/{id}', 'CustomerController@destroy');

    $router->get('/orders', 'OrderController@index');
    $router->post('/orders', 'OrderController@store');
    $router->get('/order/{id}', 'OrderController@show');
    $router->put('/order/{id}', 'OrderController@update');
    $router->delete('/order/{id}', 'OrderController@destroy');

    $router->get('/employees', 'EmployeeController@index');
    $router->post('/employees', 'EmployeeController@store');
    $router->get('/employee/{id}', 'EmployeeController@show');
    $router->put('/employee/{id}', 'EmployeeController@update');
    $router->delete('/employee/{id}', 'EmployeeController@destroy');
});

//Group Latihan 4
$router->group(['prefix' => 'latihan4', 'namespace' => 'Latihan4'], function () use ($router) {
    $router->get('/posts', 'PostController@index');
    $router->post('/posts', 'PostController@store');
    $router->get('/post/{id}', 'PostController@show');
    $router->put('/post/{id}', 'PostController@update');
    $router->delete('/post/{id}', 'PostController@destroy');
});

//Group Latihan 5
$router->group(['prefix' => 'latihan5', 'namespace' => 'Latihan5'], function () use ($router) {
    $router->get('/posts', 'PostController@index');
    $router->post('/posts', 'PostController@store');
    $router->get('/post/{id}', 'PostController@show');
    $router->put('/post/{id}', 'PostController@update');
    $router->delete('/post/{id}', 'PostController@destroy');
});

//Group Auth (Latihan 6)
$router->group(['prefix' => 'auth', 'namespace' => 'Auth'], function () use ($router) {
    $router->post('/register', 'AuthController@register');
    $router->post('/login', 'AuthController@login');
});

//Group Latihan 6 with middleware auth
$router->group(['middleware' => ['auth'], 'prefix' => 'latihan6', 'namespace' => 'Latihan6'], function () use ($router) {
    $router->get('/posts', 'PostController@index');
    $router->post('/posts', 'PostController@store');
    $router->get('/post/{id}', 'PostController@show');
    $router->put('/post/{id}', 'PostController@update');
    $router->delete('/post/{id}', 'PostController@destroy');

    $router->get('/books', 'BookController@index');
    $router->post('/books', 'BookController@store');
    $router->get('/book/{id}', 'BookController@show');
    $router->put('/book/{id}', 'BookController@update');
    $router->delete('/book/{id}', 'BookController@destroy');
});

//UAS
$router->group(['middleware' => ['auth'], 'prefix' => 'uas', 'namespace' => 'Uas'], function () use ($router) {
    $router->get('/projects', 'ProjectController@index');
    $router->post('/projects', 'ProjectController@store');
    $router->get('/project/{id}', 'ProjectController@show');
    $router->put('/project/{id}', 'ProjectController@update');
    $router->delete('/project/{id}', 'ProjectController@destroy');

    $router->get('/tasks', 'TaskController@index');
    $router->post('/tasks', 'TaskController@store');
    $router->get('/task/{id}', 'TaskController@show');
    $router->put('/task/{id}', 'TaskController@update');
    $router->delete('/task/{id}', 'TaskController@destroy');

    $router->get('/events', 'EventController@index');
    $router->post('/events', 'EventController@store');
    $router->get('/event/{id}', 'EventController@show');
    $router->put('/event/{id}', 'EventController@update');
    $router->delete('/event/{id}', 'EventController@destroy');

    $router->get('/notes', 'NoteController@index');
    $router->post('/notes', 'NoteController@store');
    $router->get('/note/{id}', 'NoteController@show');
    $router->put('/note/{id}', 'NoteController@update');
    $router->delete('/note/{id}', 'NoteController@destroy');

    $router->get('/messages', 'MessageController@index');
    $router->post('/messages', 'MessageController@store');
    $router->get('/message/{id}', 'MessageController@show');
    $router->put('/message/{id}', 'MessageController@update');
    $router->delete('/message/{id}', 'MessageController@destroy');
});
