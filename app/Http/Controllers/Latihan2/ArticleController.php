<?php

namespace App\Http\Controllers\Latihan2;

use App\Models\Article;
use Laravel\Lumen\Routing\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        return response()->json(Article::with('author')->paginate(10));
    }

    public function show($id)
    {
        return response()->json(Article::with('category')->findOrFail($id));
    }

    public function store(Request $request)
    {
        $data = $request->only(['title', 'content', 'author_id', 'category_id']);
        $article = Article::create($data);
        return response()->json($article);
    }
}
