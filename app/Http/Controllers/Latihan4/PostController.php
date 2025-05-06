<?php

namespace App\Http\Controllers\Latihan4;

use Laravel\Lumen\Routing\Controller;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $acceptHeader = $request->header('Accept');

        if ($acceptHeader === 'application/json' || $acceptHeader === 'application/xml') {
            $posts = Post::OrderBy("id", "DESC")->paginate(10);

            if ($acceptHeader === 'application/json') {
                return response()->json($posts->items('data'), 200);
            } else {
                $xml = new \SimpleXMLElement('<posts/>');
                foreach ($posts->items('data') as $item) {
                    $xmlItem = $xml->addChild('posts');

                    $xmlItem->addChild('id', $item->id);
                    $xmlItem->addChild('title', $item->title);
                    $xmlItem->addChild('status', $item->status);
                    $xmlItem->addChild('content', $item->content);
                    $xmlItem->addChild('user_id', $item->user_id);
                    $xmlItem->addChild('created_at', $item->created_at);
                    $xmlItem->addChild('updated_at', $item->updated_at);
                }

                return $xml->asXML();
            }
        } else {
            return response('Not Acceptable!', 406);
        }
    }

    public function store(Request $request)
    {
        $acceptHeader = $request->header('Accept');
        $contentTypeHeader = $request->header('Content-Type');

        if ($acceptHeader !== 'application/json' && $acceptHeader !== 'application/xml') {
            return response('Not Acceptable!', 406);
        }

        if ($contentTypeHeader === 'application/json') {
            $input = $request->all();
        } elseif ($contentTypeHeader === 'application/xml') {
            $xml = simplexml_load_string($request->getContent());
            $input = json_decode(json_encode($xml), true);
        } else {
            return response('Unsupported Media Type', 415);
        }

        $post = Post::create($input);

        if ($acceptHeader === 'application/json') {
            return response()->json($post, 201);
        } else {
            $xml = new \SimpleXMLElement('<post/>');
            $xml->addChild('id', $post->id);
            $xml->addChild('title', $post->title);
            $xml->addChild('status', $post->status);
            $xml->addChild('content', $post->content);
            $xml->addChild('user_id', $post->user_id);
            $xml->addChild('created_at', $post->created_at);
            $xml->addChild('updated_at', $post->updated_at);

            return response($xml->asXML(), 201)->header('Content-Type', 'application/xml');
        }
    }

    public function show(Request $request, $id)
    {
        $acceptHeader = $request->header('Accept');

        if ($acceptHeader !== 'application/json' && $acceptHeader !== 'application/xml') {
            return response('Not Acceptable!', 406);
        }

        $post = Post::find($id);

        if (!$post) {
            abort(404);
        }

        if ($acceptHeader === 'application/json') {
            return response()->json($post, 200);
        } else {
            $xml = new \SimpleXMLElement('<post/>');
            $xml->addChild('id', $post->id);
            $xml->addChild('title', $post->title);
            $xml->addChild('status', $post->status);
            $xml->addChild('content', $post->content);
            $xml->addChild('user_id', $post->user_id);
            $xml->addChild('created_at', $post->created_at);
            $xml->addChild('updated_at', $post->updated_at);

            return response($xml->asXML(), 200)->header('Content-Type', 'application/xml');
        }
    }


    public function update(Request $request, $id)
    {
        $acceptHeader = $request->header('Accept');
        $contentTypeHeader = $request->header('Content-Type');

        if ($acceptHeader !== 'application/json' && $acceptHeader !== 'application/xml') {
            return response('Not Acceptable!', 406);
        }

        if ($contentTypeHeader === 'application/json') {
            $input = $request->all();
        } elseif ($contentTypeHeader === 'application/xml') {
            $xml = simplexml_load_string($request->getContent());
            $input = json_decode(json_encode($xml), true);
        } else {
            return response('Unsupported Media Type', 415);
        }

        $post = Post::find($id);
        if (!$post) {
            abort(404);
        }

        $post->fill($input);
        $post->save();

        if ($acceptHeader === 'application/json') {
            return response()->json($post, 200);
        } else {
            $xml = new \SimpleXMLElement('<post/>');
            $xml->addChild('id', $post->id);
            $xml->addChild('title', $post->title);
            $xml->addChild('status', $post->status);
            $xml->addChild('content', $post->content);
            $xml->addChild('user_id', $post->user_id);
            $xml->addChild('created_at', $post->created_at);
            $xml->addChild('updated_at', $post->updated_at);

            return response($xml->asXML(), 200)->header('Content-Type', 'application/xml');
        }
    }



    public function destroy(Request $request, $id)
    {
        $acceptHeader = $request->header('Accept');
        $contentTypeHeader = $request->header('Content-Type');

        if ($acceptHeader !== 'application/json' && $acceptHeader !== 'application/xml') {
            return response('Not Acceptable!', 406);
        }

        if ($contentTypeHeader !== 'application/json' && $contentTypeHeader !== 'application/xml') {
            return response('Unsupported Media Type', 415);
        }

        $post = Post::find($id);
        if (!$post) {
            abort(404);
        }

        $post->delete();
        $message = ['message' => 'deleted successfully', 'post_id' => $id];

        if ($acceptHeader === 'application/json') {
            return response()->json($message, 200);
        } else {
            $xml = new \SimpleXMLElement('<response/>');
            $xml->addChild('message', 'deleted successfully');
            $xml->addChild('post_id', $id);

            return response($xml->asXML(), 200)->header('Content-Type', 'application/xml');
        }
    }
}
