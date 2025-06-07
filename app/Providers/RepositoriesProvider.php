<?php

namespace App\Providers;

use App\Http\interfaces\ClientesInterface;
use App\Http\repositories\ClientesRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesProvider extends ServiceProvider
{
    public array $bindings = [
        ClientesInterface::class=>ClientesRepository::class
    ];
}
