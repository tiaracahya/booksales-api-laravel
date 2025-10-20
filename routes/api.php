<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;


Route::get('/test', function () {
    return response()->json(['message' => 'API is working!']);
});

// =====================
// ROUTE GENRES
// =====================
Route::get('/genres', [GenreController::class, 'index']);   // GET all
Route::post('/genres', [GenreController::class, 'store']);   // POST create
Route::get('/genres/{id}', [GenreController::class, 'show']); // GET by ID
Route::post('/genres/{id}', [GenreController::class, 'update']); // PUT update
Route::delete('/genres/{id}', [GenreController::class, 'destroy']); // DELETE

// =====================
// ROUTE AUTHORS
// =====================
Route::get('/authors', [AuthorController::class, 'index']);   // GET all
Route::post('/authors', [AuthorController::class, 'store']);  // POST create
Route::get('/authors/{id}', [AuthorController::class, 'show']); // GET by ID
Route::post('/authors/{id}', [AuthorController::class, 'update']); // PUT update
Route::delete('/authors/{id}', [AuthorController::class, 'destroy']); // DELETE

