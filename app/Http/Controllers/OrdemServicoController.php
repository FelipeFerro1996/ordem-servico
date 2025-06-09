<?php

namespace App\Http\Controllers;

use App\Http\DTOs\OrdemServicoDTO;
use App\Http\interfaces\OrdemServicoInterface;
use App\Http\Requests\OrdemServicoRequest;
use Illuminate\Http\Request;

class OrdemServicoController extends Controller
{
    public function __construct(
        public OrdemServicoInterface $ordem_servico_repository
    ) {}

    public function index()
    {
        $clientes = $this->ordem_servico_repository->getAllOrdensServicos();

        return response()->json([
            'dados'=>$clientes
        ], 200);
    }

    public function store(OrdemServicoRequest $request){

        $ordemServicoDTO = OrdemServicoDTO::fromArray($request->validated());

        $response = $this->ordem_servico_repository->insertOrdemServico($ordemServicoDTO);

        return response()->json($response, $response['success'] ? 200 : 500);
    }
}
