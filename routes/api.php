<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\OrdemServicoController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::middleware(['jwt.auth'])->group(function () {

    Route::middleware('admin')->group(function () {
        Route::apiResource('clientes', ClientesController::class);
        Route::apiResource('produtos', ProdutosController::class);
        Route::post('/ordem_servico', [OrdemServicoController::class, 'store'])->name('ordem_servico');
    });
    
    Route::post('/ordem_servico', [OrdemServicoController::class, 'store'])->name('ordem_servico');

    Route::middleware('user')->group(function () {
    });
});

Route::post('/login-token',[UserController::class, 'login_token']);