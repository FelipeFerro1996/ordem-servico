<?php

namespace App\Http\DTOs;

use PhpParser\Node\Expr\Cast\Array_;

class ProdutosDTO
{
    public function __construct(
        public readonly string $codigo,
        public readonly string $descricao,
        public readonly string $status,
        public readonly string $tempo_garantia
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(...$data);
    }

    public function toArray(): Array
    {
        return get_object_vars($this);
    }

}