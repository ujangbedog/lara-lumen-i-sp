<?php

namespace App\Http\Controllers\Latihan1;

use Laravel\Lumen\Routing\Controller;

class ProfileController extends Controller
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

    public function show($id)
    {
        return response()->json([
            'id' => $id,
            'name' => 'User ' . $id,
            'bio' => 'Ini adalah profil user dengan ID ' . $id
        ]);
    }
}
