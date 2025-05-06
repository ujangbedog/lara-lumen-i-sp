<?php

namespace App\Http\Controllers\Uas;

use Laravel\Lumen\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $messages = Message::where('user_id', Auth::user()->id)
            ->orderBy('id', 'DESC')
            ->paginate(2)
            ->toArray();

        return response()->json([
            "total_count" => $messages["total"],
            "limit" => $messages["per_page"],
            "pagination" => [
                "next_page" => $messages["next_page_url"],
                "current_page" => $messages["current_page"],
            ],
            "data" => $messages["data"],
        ], 200);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;

        $rules = [
            'subject' => 'required|min:3',
            'body' => 'required|min:5',
            'recipient' => 'required|min:3',
            'status' => 'in:draft,sent,archived',
            'is_read' => 'boolean',
            'user_id' => 'required|exists:users,id',
        ];

        $validator = \Validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        return response()->json(Message::create($input), 200);
    }

    public function show($id)
    {
        $message = Message::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->first();

        if (!$message) {
            abort(404);
        }

        return response()->json($message, 200);
    }

    public function update(Request $request, $id)
    {
        $message = Message::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->first();

        if (!$message) {
            abort(404);
        }

        $input = $request->all();

        $rules = [
            'subject' => 'required|min:3',
            'body' => 'required|min:5',
            'recipient' => 'required|min:3',
            'status' => 'in:draft,sent,archived',
            'is_read' => 'boolean',
            'user_id' => 'required|exists:users,id',
        ];

        $validator = \Validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $message->fill($input)->save();

        return response()->json($message, 200);
    }

    public function destroy($id)
    {
        $message = Message::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->first();

        if (!$message) {
            abort(404);
        }

        $message->delete();

        return response()->json([
            'message' => 'deleted successfully',
            'message_id' => $id,
        ], 200);
    }
}
