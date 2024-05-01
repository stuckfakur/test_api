<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookControllerAPIS extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Book::all();
        return response()->json([
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Book::create($request->all());
        return response()->json([
            'status' => 'success',
            'message' => 'Data created successfully',
            'data' => $data
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Book::find($id);
        return response()->json([
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => [$data]
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Book::find($id);
        $data->update($request->all());
        return response()->json([
            'status' => 'success',
            'message' => 'Data updated successfully',
            'data' => $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Book::find($id);
        $data->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Data deleted successfully',
        ],200);
    }
}
