<?php

namespace App\Http\interfaces;

use App\Http\DTOs\ClientesDTO;

interface ClientesInterface
{
    public function getAllClientes();

    public function createUpdateCliente(ClientesDTO $dto, $id = NULL): array;

    public function delete($id): array;
}