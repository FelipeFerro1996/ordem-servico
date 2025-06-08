<?php

namespace App\Http\repositories;

use App\Http\DTOs\ProdutosDTO;
use App\Http\interfaces\ProdutosInterface;
use App\Models\Produtos;
use Exception;

class ProdutosRepository implements ProdutosInterface
{
    public function getAllProdutos(){
        $produtos = new Produtos();

        return $produtos->paginate(10);
    }

    public function createUpdateProduto(ProdutosDTO $dto, $id = NULL): array {
        try{

            if(!empty($id)){
                $produto = Produtos::findOrFail($id);
                $produto->update($dto->toArray());
            }else{
                $produto = Produtos::create($dto->toArray());
            }

            return [
                'success' => true,
                'message' => 'Produto salvo com sucesso',
                'data' => $produto
            ];

        }catch(Exception $e){

            return [
                'success'=>false,
                'message'=>'Erro ao salvar o Produto',
                'error'=>$e->getMessage()
            ];

        }
    }

    public function delete($id) : array
    {
        try{

            $produto = Produtos::findOrFail($id);

            $produto->delete();

            return [
                'success'=>true,
                'message'=>'Produto excluído com sucesso'
            ];

        }catch(Exception $e){

            return [
                'success'=>false,
                'message'=>'Erro ao excluir o Produto',
                'error' => $e->getMessage()
            ];

        }
    }
}