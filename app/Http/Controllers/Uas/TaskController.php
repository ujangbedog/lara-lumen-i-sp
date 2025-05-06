<?php

namespace App\Http\Controllers\Uas;

use Laravel\Lumen\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $data = Task::where('user_id', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->paginate(2)
            ->toArray();

        return response()->json([
            'total_count' => $data['total'],
            'limit' => $data['per_page'],
            'pagination' => [
                'next_page' => $data['next_page_url'],
                'current_page' => $data['current_page'],
            ],
            'data' => $data['data'],
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;

        $validator = \Validator::make($input, [
            'title' => 'required|min:3',
            'description' => 'nullable|string|min:5',
            'status' => 'required|in:pending,completed',
            'priority' => 'required|in:low,medium,high',
            'due_date' => 'nullable|date|after:today',
            'user_id' => 'required|exists:users,id'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        return response()->json(Task::create($input), 200);
    }

    public function show($id)
    {
        $item = Task::find($id);
        if (!$item) {
            abort(404);
        }
        return response()->json($item, 200);
    }

    public function update(Request $request, $id)
    {
        $item = Task::find($id);
        if (!$item) {
            abort(404);
        }

        $input = $request->all();
        $validator = \Validator::make($input, [
            'title' => 'required|min:3',
            'description' => 'nullable|string|min:5',
            'status' => 'required|in:pending,completed',
            'priority' => 'required|in:low,medium,high',
            'due_date' => 'nullable|date|after:today',
            'user_id' => 'required|exists:users,id'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $item->fill($input)->save();
        return response()->json($item, 200);
    }

    public function destroy($id)
    {
        $item = Task::find($id);
        if (!$item) {
            abort(404);
        }
        $item->delete();

        return response()->json(['message' => 'deleted successfully', 'id' => $id], 200);
    }
}
