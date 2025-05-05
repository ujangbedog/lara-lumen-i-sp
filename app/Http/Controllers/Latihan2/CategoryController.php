<?php

namespace App\Http\Controllers\Latihan2;

use App\Models\Category;
use Laravel\Lumen\Routing\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(Category::all());
    }

    public function show($id)
    {
        return response()->json(Category::findOrFail($id));
    }
}
