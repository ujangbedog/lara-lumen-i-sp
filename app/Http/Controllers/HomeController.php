<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return response()->json([
            'service_name' => 'PHP Service App',
            'status' => 'Running',
            'endpoints' => [
                'latihan1' => [
                    '/latihan1/hello-lumen',
                    '/latihan1/hello-lumen/{name}',
                    '/latihan1/scores (with login middleware)',
                    '/latihan1/users',
                    '/latihan1/users/{id}',
                    '/latihan1/books',
                    '/latihan1/cities',
                    '/latihan1/profile/{id}',
                    '/latihan1/status',
                    '/latihan1/secure-data (with apikey middleware)',
                ],
                'latihan2' => [
                    '/latihan2/posts',
                    '/latihan2/articles',
                    '/latihan2/articles/{id}',
                    '/latihan2/articles (POST)',
                    '/latihan2/authors',
                    '/latihan2/categories',
                    '/latihan2/comments',
                    '/latihan2/tags',
                ],
                'latihan3' => [
                    '/latihan3/posts',
                    '/latihan3/posts (POST)',
                    '/latihan3/post/{id}',
                    '/latihan3/post/{id} (PUT)',
                    '/latihan3/post/{id} (DELETE)',
                    '/latihan3/products',
                    '/latihan3/products (POST)',
                    '/latihan3/product/{id}',
                    '/latihan3/product/{id} (PUT)',
                    '/latihan3/product/{id} (DELETE)',
                ],
                'uts' => [
                    '/uts/customers',
                    '/uts/customers (POST)',
                    '/uts/customer/{id}',
                    '/uts/customer/{id} (PUT)',
                    '/uts/customer/{id} (DELETE)',
                    '/uts/orders',
                    '/uts/orders (POST)',
                    '/uts/order/{id}',
                    '/uts/order/{id} (PUT)',
                    '/uts/order/{id} (DELETE)',
                    '/uts/employees',
                    '/uts/employees (POST)',
                    '/uts/employee/{id}',
                    '/uts/employee/{id} (PUT)',
                    '/uts/employee/{id} (DELETE)',
                ],
                'coba' => [
                    '/coba',
                ],
            ],
        ]);
    }
}
