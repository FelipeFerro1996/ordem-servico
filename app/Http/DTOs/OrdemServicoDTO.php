<?php

namespace App\Http\DTOs;

use PhpParser\Node\Expr\Cast\Array_;

class OrdemServicoDTO
{
    public function __construct(
        public readonly string $numero,
        public readonly string $data_abertura,
        public readonly string $cpf_consumidor,
        public readonly string $nome_consumidor,
        public readonly string $produtos_id
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