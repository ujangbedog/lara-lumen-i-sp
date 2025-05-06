<?php

namespace App\Http\Controllers\Uts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::orderBy('id', 'DESC')->paginate(10);

        $outPut = [
            "message" => "customers",
            "result" => $customers,
        ];

        return response()->json($outPut, 200);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $customer = Customer::create($input);

        return response()->json(['message' => 'customer created', 'data' => $customer], 201);
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        if (!$customer) return response()->json(['message' => 'customer not found'], 404);

        return response()->json(['message' => 'customer detail', 'data' => $customer], 200);
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        if (!$customer) return response()->json(['message' => 'Customer not found'], 404);

        $customer->update($request->all());
        return response()->json(['message' => 'Customer updated', 'data' => $customer], 200);
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        if (!$customer) return response()->json(['message' => 'Customer not found'], 404);

        $customer->delete();
        return response()->json(['message' => 'Customer deleted'], 200);
    }
}
