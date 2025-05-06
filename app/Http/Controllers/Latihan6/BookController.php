<?php

namespace App\Http\Controllers\Latihan6;

use Laravel\Lumen\Routing\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::orderBy("id", "DESC")
            ->paginate(10)
            ->toArray();

        $response = [
            "total_count" => $books["total"],
            "limit" => $books["per_page"],
            "pagination" => [
                "next_page" => $books["next_page_url"],
                "current_page" => $books["current_page"],
            ],
            "data" => $books["data"],
        ];

        return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validationRules = [
            'title' => 'required|min:3|max:200',
            'author' => 'required|min:3|max:100',
            'isbn' => 'required|unique:books,isbn|min:10|max:20',
            'published_year' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
            'status' => 'sometimes|in:available,borrowed,lost',
            'pages' => 'required|integer|min:1',
        ];

        $validator = \Validator::make($input, $validationRules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $book = Book::create($input);
        return response()->json($book, 201);
    }

    public function show($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        return response()->json($book, 200);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $validationRules = [
            'title' => 'sometimes|min:3|max:200',
            'author' => 'sometimes|min:3|max:100',
            'isbn' => 'sometimes|unique:books,isbn,' . $id . '|min:10|max:20',
            'published_year' => 'sometimes|digits:4|integer|min:1900|max:' . (date('Y') + 1),
            'status' => 'sometimes|in:available,borrowed,lost',
            'pages' => 'sometimes|integer|min:1',
        ];

        $validator = \Validator::make($input, $validationRules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $book->fill($input);
        $book->save();

        return response()->json($book, 200);
    }

    public function destroy($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $book->delete();
        return response()->json(['message' => 'Book deleted successfully', 'book_id' => $id], 200);
    }
}
