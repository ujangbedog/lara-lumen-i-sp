<?php

namespace App\Http\Controllers\Latihan3;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(10);

        $outPut = [
            "message" => "products",
            "result" => $products,
        ];

        return response()->json($outPut, 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category' => 'required',
            'sku' => 'required|unique:products'
        ]);

        $product = Product::create($request->all());
        return response()->json(['message' => 'Product created', 'data' => $product], 201);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) return response()->json(['message' => 'Product not found'], 404);

        return response()->json(['message' => 'Product detail', 'data' => $product], 200);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) return response()->json(['message' => 'Product not found'], 404);

        $product->update($request->all());
        return response()->json(['message' => 'Product updated', 'data' => $product], 200);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) return response()->json(['message' => 'Product not found'], 404);

        $product->delete();
        return response()->json(['message' => 'Product deleted'], 200);
    }
}
