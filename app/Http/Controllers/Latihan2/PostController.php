<?php

namespace App\Http\Controllers\Latihan2;

use Laravel\Lumen\Routing\Controller;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::OrderBy("id", "DESC")->paginate(10);

        $outPut = [
            "message" => "posts",
            "result" => $posts,
        ];

        return response()->json($posts, 200);
    }
}
