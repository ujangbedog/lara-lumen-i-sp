<?php

namespace App\Http\Controllers\Uts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id', 'DESC')->paginate(10);

        $outPut = [
            "message" => "orders",
            "result" => $orders,
        ];

        return response()->json($outPut, 200);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $order = Order::create($input);

        return response()->json(['message' => 'order created', 'data' => $order], 201);
    }

    public function show($id)
    {
        $order = Order::find($id);
        if (!$order) return response()->json(['message' => 'order not found'], 404);

        return response()->json(['message' => 'order detail', 'data' => $order], 200);
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        if (!$order) return response()->json(['message' => 'order not found'], 404);

        $order->update($request->all());
        return response()->json(['message' => 'order updated', 'data' => $order], 200);
    }


    public function destroy($id)
    {
        $order = Order::find($id);
        if (!$order) return response()->json(['message' => 'order not found'], 404);

        $order->delete();
        return response()->json(['message' => 'order deleted'], 200);
    }
}
