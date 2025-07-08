<?php

use App\Http\Controllers\TownsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/towns', [TownsController::class, 'index']);

Route::get('/towns/{id}', [TownsController::class, 'show']);

Route::post('/towns', [TownsController::class, 'store']);

Route::delete('/towns/{id}', [TownsController::class, 'destroy']);
