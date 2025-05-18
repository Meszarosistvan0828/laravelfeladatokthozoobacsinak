<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/api/books',[BookController::class,'index']);
Route::post('/api/books', [BookController::class, 'store'])->name('books.store');
Route::delete('/api/books/{id}', [BookController::class, 'destroy']);
Route::get('/api/books/{id}', [BookController::class, 'show']);


