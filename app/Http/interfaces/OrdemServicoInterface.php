<?php

namespace App\Http\interfaces;

use App\Http\DTOs\OrdemServicoDTO;

interface OrdemServicoInterface
{
    public function insertOrdemServico(OrdemServicoDTO $dto): array;

    public function getAllOrdensServicos();
}