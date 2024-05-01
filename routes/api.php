<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/books',[App\Http\Controllers\Api\BookControllerAPIS::class, 'index']);
Route::get('/books/{id}',[App\Http\Controllers\Api\BookControllerAPIS::class, 'show']);
Route::post('/books',[App\Http\Controllers\Api\BookControllerAPIS::class, 'store']);
Route::put('/books/{id}',[App\Http\Controllers\Api\BookControllerAPIS::class, 'update']);
Route::delete('/books/{id}',[App\Http\Controllers\Api\BookControllerAPIS::class, 'destroy']);
