<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/foods', [FoodController::class, 'index']);
Route::post('/api/foods', [FoodController::class, 'store']);
Route::get('/api/ingredients', [FoodController::class, 'ingredients']);
Route::get('/api/foods/search/{ingredient}', [FoodController::class, 'searchByIngredient']);