<?php

namespace App\Http\Controllers\Latihan1;

use Laravel\Lumen\Routing\Controller;

class SecureDataController extends Controller
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
            'data' => 'Ini data rahasia yang hanya bisa diakses dengan API key.'
        ]);
    }
}
