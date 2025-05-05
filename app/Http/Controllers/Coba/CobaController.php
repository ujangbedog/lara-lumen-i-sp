<?php

namespace App\Http\Controllers\Coba;

use Laravel\Lumen\Routing\Controller;

class CobaController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'OK!']);
    }
}
