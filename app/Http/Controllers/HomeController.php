<?php

namespace App\Http\Controllers;

class HomeController extends Controller
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
            'service_name' => 'PHP Service App',
            'status' => 'Running',
        ]);
    }
}
