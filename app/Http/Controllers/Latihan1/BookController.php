<?php

namespace App\Http\Controllers\Latihan1;

use Laravel\Lumen\Routing\Controller;

class BookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        return "Lumen Controller";
    }

    public function index()
    {
        return response()->json([
            ['id' => 1, 'title' => 'Laravel for Beginners'],
            ['id' => 2, 'title' => 'Lumen Microservices'],
        ]);
    }
}
