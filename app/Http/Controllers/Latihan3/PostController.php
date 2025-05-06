<?php

namespace App\Http\Controllers\Latihan3;

use Laravel\Lumen\Routing\Controller;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::OrderBy("id", "DESC")->paginate(10);

        $outPut = [
            "message" => "posts",
            "result" => $posts,
        ];

        return response()->json($outPut, 200);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $post = Post::create($input);

        return response()->json($post, 200);
    }

    public function show($id)
    {
        $post = Post::find($id);

        if (!$post) {
            abort(404);
        }

        return response()->json($post, 200);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $post = Post::find($id);

        if (!$post) {
            abort(404);
        }

        $post->fill($input);
        $post->save();

        return response()->json($post, 200);
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post) {
            abort(404);
        }

        $post->delete();
        $message = ['message' => 'deleted successfully', 'post_id' => $id];

        return response()->json($message, 200);
    }
}
