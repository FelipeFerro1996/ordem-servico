<?php

namespace App\Http\repositories;

use App\Http\DTOs\ClientesDTO;
use App\Http\DTOs\OrdemServicoDTO;
use App\Http\interfaces\OrdemServicoInterface;
use App\Models\OrdemServico;
use Exception;

class OrdemServicoRepository implements OrdemServicoInterface
{

    public function getAllOrdensServicos(){
        $ordens = new OrdemServico();
        return $ordens
                ->orderBy('data_abertura', 'DESC')
                ->with('produto')
                ->with('cliente')
                ->paginate(10);
    }

    public function insertOrdemServico(OrdemServicoDTO $dto): array{
        try{

            $cliente_repository = New ClientesRepository();
            $cliente = $cliente_repository->getClienteBycpf(cpf:$dto->cpf_consumidor, ignoreId:$this->ignoreId??'');

            if(empty($cliente->id)){
                $clienteDto = new ClientesDTO(
                    nome:$dto->nome_consumidor,
                    cpf:$dto->cpf_consumidor
                );

                $response = $cliente_repository->createUpdateCliente($clienteDto);
                $cliente = $response['data'];
            }

            $ordem = OrdemServico::create([
                'numero'=>$dto->numero,
                'data_abertura'=>$dto->data_abertura,
                'clientes_id'=>$cliente->id,
                'produtos_id'=>$dto->produtos_id
            ]);

            return [
                'success' => true,
                'message' => 'Ordem de serviço salvo com sucesso',
                'data' => $ordem
            ];

        }catch(Exception $e){

            return [
                'success'=>false,
                'message'=>'Erro ao salvar a ordem de serviço',
                'error'=>$e->getMessage()
            ];

        }
    }
}