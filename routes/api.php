<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('user', [AuthController::class, 'user']);
Route::post('logout', [AuthController::class, 'logout']);

Route::prefix('user')->group(function () {
    Route::get('book', [BookController::class, 'index']);
    Route::post('book', [BookController::class, 'store']);
    Route::get('book/{id}', [BookController::class, 'show']);
    Route::put('book/{id}', [BookController::class, 'update']);
    Route::delete('book/{id}', [BookController::class, 'destroy']);
});
