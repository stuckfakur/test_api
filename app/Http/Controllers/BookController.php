<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
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

    public function store(Request $request)
    {
        $data = $request->validate([
            'book_name' => ['required'],
            'author' => ['required'],
            'description' => ['required'],
        ]);

        return Book::create($data);
    }

    public function show(Book $book)
    {
        return $book;
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
