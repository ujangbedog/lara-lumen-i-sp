<?php

namespace App\Http\Controllers\Latihan2;

use App\Models\Author;
use Laravel\Lumen\Routing\Controller;

class AuthorController extends Controller
{
    public function index()
    {
        return response()->json(Author::all());
    }

    public function show($id)
    {
        return response()->json(Author::findOrFail($id));
    }
}
