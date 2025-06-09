<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('CadastroOrdemServico'));
});

// clientes
Route::prefix('clientes')->group(function(){

    Route::get('/', function(){
        return view('clientes.index');
    })->name('listaClientes');

    Route::get('/create', function(){
        return view('clientes.formClientes');
    })->name('cadastroCliente');
});

// produtos
Route::prefix('produtos')->group(function(){

    Route::get('/', function(){
        return view('produtos.index');
    })->name('listaProdutos');

    Route::get('/create', function(){
        return view('produtos.formProdutos');
    })->name('cadastroProduto');
});

// produtos
Route::prefix('ordem-servico')->group(function(){

    Route::get('/', function(){
        return view('ordemServico.index');
    })->name('listaOrdensServico');
    
    Route::get('/create', function(){
        return view('ordemServico.formOrdemServico');
    })->name('CadastroOrdemServico');
});



// login
Route::get('/login', function(){
    return view('login.formLogin');
});
