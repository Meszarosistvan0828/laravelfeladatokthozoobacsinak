<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\Api\DailyMenuController;

Route::get('/menus', [DailyMenuController::class, 'index']);
Route::get('/menus/search/{query}', [DailyMenuController::class, 'search']);
Route::post('/menus', [DailyMenuController::class, 'store']);