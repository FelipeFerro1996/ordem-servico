<?php

namespace App\Http\interfaces;

use App\Http\DTOs\ProdutosDTO;

interface ProdutosInterface
{
    public function getAllProdutos();

    public function getAllProdutosSelect($palavra_chave = NULL);

    public function createUpdateProduto(ProdutosDTO $dto, $id = NULL): array;

    public function delete($id): array;
}