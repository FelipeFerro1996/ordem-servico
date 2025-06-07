<?php

namespace App\Http\DTOs;

class EnderecoDTO
{
    public function __construct(
        public readonly string $rua,
        public readonly string $cep,
        public readonly string $bairro,
        public readonly string $numero,
        public readonly string $cidade,
        public readonly string $estado
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