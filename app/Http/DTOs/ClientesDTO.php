<?php

namespace App\Http\DTOs;

use PhpParser\Node\Expr\Cast\Array_;

class ClientesDTO
{
    public function __construct(
        public readonly string $nome,
        public readonly string $cpf
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