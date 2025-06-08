<?php

namespace App\Providers;

use App\Http\interfaces\ClientesInterface;
use App\Http\interfaces\OrdemServicoInterface;
use App\Http\interfaces\ProdutosInterface;
use App\Http\repositories\ClientesRepository;
use App\Http\repositories\OrdemServicoRepository;
use App\Http\repositories\ProdutosRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesProvider extends ServiceProvider
{
    public array $bindings = [
        ClientesInterface::class=>ClientesRepository::class,
        ProdutosInterface::class=>ProdutosRepository::class,
        OrdemServicoInterface::class=>OrdemServicoRepository::class
    ];
}
