<?php

namespace App\Http\repositories;

use App\Http\DTOs\ClientesDTO;
use App\Http\interfaces\ClientesInterface;
use App\Models\Clientes;
use Exception;

class ClientesRepository implements ClientesInterface
{
    public function getAllClientes(){
        $clientes = new Clientes();

        return $clientes->with('endereco')->paginate(10);
    }

    public function createUpdateCliente(ClientesDTO $dto, $id = NULL): array {
        try{

            if(!empty($id)){
                $cliente = Clientes::findOrFail($id);
                $cliente->update($dto->toArray());
            }else{
                $cliente = Clientes::create($dto->toArray());
            }

            $cliente->endereco()->updateOrCreate(
                ['clientes_id' => $cliente->id], // condição
                [
                    'rua' => $dto->enderecoDto->rua,
                    'numero' => $dto->enderecoDto->numero,
                    'bairro' => $dto->enderecoDto->bairro,
                    'cidade' => $dto->enderecoDto->cidade,
                    'estado' => $dto->enderecoDto->estado,
                    'cep' => $dto->enderecoDto->cep,
                ]
            );

            return [
                'success' => true,
                'message' => 'Cliente salvo com sucesso',
                'data' => $cliente->load('endereco')
            ];

        }catch(Exception $e){

            return [
                'success'=>false,
                'message'=>'Erro ao salvar o Cliente',
                'error'=>$e->getMessage()
            ];

        }
    }

    public function delete($id) : array
    {
        try{

            $cliente = Clientes::findOrFail($id);

            $cliente->delete();

            return [
                'success'=>true,
                'message'=>'Cliente excluído com sucesso'
            ];

        }catch(Exception $e){

            return [
                'success'=>false,
                'message'=>'Erro ao excluir o Cliente',
                'error' => $e->getMessage()
            ];

        }
    }
}