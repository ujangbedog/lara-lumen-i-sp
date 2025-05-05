<?php

namespace App\Http\Controllers\Latihan2;

use App\Models\Comment;
use Laravel\Lumen\Routing\Controller;

class CommentController extends Controller
{
    public function index()
    {
        return response()->json(Comment::with('article')->get());
    }

    public function show($id)
    {
        return response()->json(Comment::with('article')->findOrFail($id));
    }
}
