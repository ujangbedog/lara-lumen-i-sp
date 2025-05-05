<?php

namespace App\Http\Controllers\Latihan1;

use Laravel\Lumen\Routing\Controller;

class UsersController extends Controller
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

    private $users = [
        [
            "id" => 1,
            "name" => "Sumatrana",
            "email" => "sumatrana@gmail.com",
            "address" => "Padang",
            "gender" => "Laki-laki"
        ],
        [
            "id" => 2,
            "name" => "Jawarianto",
            "email" => "jawarianto@gmail.com",
            "address" => "Cimahi",
            "gender" => "Laki-laki"
        ],
        [
            "id" => 3,
            "name" => "Kalimantanio",
            "email" => "kalimantanio@gmail.com",
            "address" => "Samarinda",
            "gender" => "Laki-laki"
        ],
        [
            "id" => 4,
            "name" => "Sulawesiani",
            "email" => "sulawesiani@gmail.com",
            "address" => "Makasar",
            "gender" => "Perempuan"
        ],
        [
            "id" => 5,
            "name" => "Papuani",
            "email" => "papuani@gmail.com",
            "address" => "Jayapura",
            "gender" => "Perempuan"
        ]
    ];

    public function index()
    {
        return response()->json($this->users);
    }

    public function show($id)
    {
        foreach ($this->users as $user) {
            if ($user['id'] == $id) {
                return response()->json($user);
            }
        }

        return response()->json(['message' => 'User not found'], 404);
    }
}
