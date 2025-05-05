<?php

namespace App\Http\Controllers\Latihan2;

use App\Models\Tag;
use Laravel\Lumen\Routing\Controller;

class TagController extends Controller
{
    public function index()
    {
        return response()->json(Tag::all());
    }

    public function show($id)
    {
        return response()->json(Tag::findOrFail($id));
    }
}
