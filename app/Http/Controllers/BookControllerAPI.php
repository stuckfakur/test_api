<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookControllerAPI extends Controller
{
    public function index()
    {
        $data = Book::orderBy('id', 'asc')->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => $data
        ],200);
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $book = Book::create($request->all());
        return response()->json($book, 201);
    }

    public function show(String $id)
    {
        $data = Book::find($id);
        if ($data) {
            return response()->json([
               'status' => 'success',
               'message' => 'Data retrieved successfully',
               'data' => [$data]
            ],200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found',
                'data' => []
            ],404);
        }
    }

    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'book_name' => ['required'],
            'author' => ['required'],
            'description' => ['required'],
        ]);

        $book->update($data);

        return $book;
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return response()->json();
    }
}
