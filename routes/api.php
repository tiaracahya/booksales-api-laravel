<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TransactionController;


// =====================
// TEST ROUTE
// =====================
Route::get('/test', function () {
    return response()->json(['message' => 'API is working!']);
});

// =====================
// AUTH ROUTES
// =====================
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// =====================
// PUBLIC ROUTES (tidak perlu login)
// =====================

// --- Genre (Read All + Show) ---
Route::get('/genres', [GenreController::class, 'index']);
Route::get('/genres/{id}', [GenreController::class, 'show']);

// --- Author (Read All + Show) ---
Route::get('/authors', [AuthorController::class, 'index']);
Route::get('/authors/{id}', [AuthorController::class, 'show']);

// --- Books (Read All + Show) ---
Route::get('/books', [BookController::class, 'index']);
Route::get('/books/{id}', [BookController::class, 'show']);

// =====================
// PROTECTED ROUTES (hanya bisa diakses setelah login & role:admin)
// =====================
Route::middleware(['auth:api', 'role:admin'])->group(function () {

    // --- Genre (Create, Update, Delete) ---
    Route::post('/genres', [GenreController::class, 'store']);
    Route::put('/genres/{id}', [GenreController::class, 'update']);
    Route::delete('/genres/{id}', [GenreController::class, 'destroy']);

    // --- Author (Create, Update, Delete) ---
    Route::post('/authors', [AuthorController::class, 'store']);
    Route::put('/authors/{id}', [AuthorController::class, 'update']);
    Route::delete('/authors/{id}', [AuthorController::class, 'destroy']);

    // --- Books (Create, Update, Delete) ---
    Route::post('/books', [BookController::class, 'store']);
    Route::put('/books/{id}', [BookController::class, 'update']);
    Route::delete('/books/{id}', [BookController::class, 'destroy']);

});

// =====================
// TRANSACTION ROUTES
// =====================

// Untuk customer yang login
Route::middleware(['auth:api', 'role:customer'])->group(function () {
    Route::post('/transactions', [TransactionController::class, 'store']); // create
    Route::get('/transactions/{id}', [TransactionController::class, 'show']); // show
    Route::put('/transactions/{id}', [TransactionController::class, 'update']); // update
});

// Untuk admin
Route::middleware(['auth:api', 'role:admin'])->group(function () {
    Route::get('/transactions', [TransactionController::class, 'index']); // read all
    Route::delete('/transactions/{id}', [TransactionController::class, 'destroy']); // delete
});
