<?php

namespace App\Http\Controllers\Uas;

use Laravel\Lumen\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::where('user_id', Auth::user()->id)
            ->orderBy('id', 'DESC')
            ->paginate(2)
            ->toArray();

        $response = [
            "total_count" => $events["total"],
            "limit" => $events["per_page"],
            "pagination" => [
                "next_page" => $events["next_page_url"],
                "current_page" => $events["current_page"],
            ],
            "data" => $events["data"],
        ];

        return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $rules = [
            'title' => 'required|min:3',
            'description' => 'nullable|string|min:5',
            'status' => 'required|in:draft,published',
            'organizer' => 'nullable|string|min:3',
            'event_date' => 'required|date',
            'location' => 'required',
            'user_id' => 'required|exists:users,id',
        ];

        $validator = \Validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $event = Event::create($input);
        return response()->json($event, 200);
    }

    public function show($id)
    {
        $event = Event::find($id);

        if (!$event) {
            abort(404);
        }

        return response()->json($event, 200);
    }

    public function update(Request $request, $id)
    {
        $event = Event::find($id);

        if (!$event) {
            abort(404);
        }

        $input = $request->all();

        $rules = [
            'title' => 'required|min:3',
            'description' => 'nullable|string|min:5',
            'status' => 'required|in:draft,published',
            'organizer' => 'nullable|string|min:3',
            'event_date' => 'required|date',
            'location' => 'required',
            'user_id' => 'required|exists:users,id',
        ];

        $validator = \Validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $event->fill($input);
        $event->save();

        return response()->json($event, 200);
    }

    public function destroy($id)
    {
        $event = Event::find($id);

        if (!$event) {
            abort(404);
        }

        $event->delete();

        return response()->json([
            'message' => 'deleted successfully',
            'event_id' => $id,
        ], 200);
    }
}
