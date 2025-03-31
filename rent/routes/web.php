<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\LibraryController;

Route::get('/books', [LibraryController::class, 'listBooks']);
Route::get('/books/{query}', [LibraryController::class, 'searchBooks']);
Route::post('/loans', [LibraryController::class, 'createLoan']);
Route::put('/loans/{id}/return', [LibraryController::class, 'returnLoan']);
Route::get('/loans', [LibraryController::class, 'listLoans']);
