<?php

namespace App\Http\Controllers;

class SystemController extends Controller
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

    public function status()
    {
        return response()->json([
            'server_time' => date('Y-m-d H:i:s'),
            'uptime' => '72 jam',
            'load' => 'Normal'
        ]);
    }
}
