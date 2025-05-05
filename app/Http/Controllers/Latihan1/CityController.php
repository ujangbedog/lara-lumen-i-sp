<?php

namespace App\Http\Controllers\Latihan1;

use Laravel\Lumen\Routing\Controller;

class CityController extends Controller
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
            'cities' => ['Bandung', 'Jakarta', 'Surabaya', 'Makassar']
        ]);
    }
}
