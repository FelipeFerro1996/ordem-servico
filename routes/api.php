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
    });
    
    Route::post('/ordem-servico', [OrdemServicoController::class, 'store'])->name('ordem_servico');
    Route::get('/lista-ordens-servicos', [OrdemServicoController::class, 'index'])->name('lista_ordens_servicos');

    Route::middleware('user')->group(function () {
    });

    Route::get('/produtos-busca', [ProdutosController::class, 'getAllProdutos']);
});

Route::middleware(['jwt.auth'])->get('/me', function (Request $request) {
    return response()->json(auth()->user());
});

Route::post('/login-token',[UserController::class, 'login_token']);