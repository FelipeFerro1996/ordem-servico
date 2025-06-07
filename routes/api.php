<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('clientes', ClientesController::class);

Route::post('/login-token',[UserController::class, 'login_token']);