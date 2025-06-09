<?php

namespace App\Http\Controllers;

use App\Http\DTOs\ProdutosDTO;
use App\Http\interfaces\ProdutosInterface;
use App\Http\Requests\ProdutosRequest;
use App\Models\Produtos;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{

    public function __construct(
        public ProdutosInterface $produtos_repository
    ) {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = $this->produtos_repository->getAllProdutos();

        return response()->json([
            'dados'=>$produtos
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProdutosRequest $request)
    {
        $produtoDto = ProdutosDTO::fromArray($request->validated());

        $response = $this->produtos_repository->createUpdateProduto($produtoDto);

        return response()->json($response, $response['success'] ? 200 : 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProdutosRequest $request, $id)
    {
        $produtoDto = ProdutosDTO::fromArray($request->validated());

        $response = $this->produtos_repository->createUpdateProduto(dto:$produtoDto, id:$id);

        return response()->json($response, $response['success'] ? 200 : 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = $this->produtos_repository->delete($id);

        return response()->json($response, $response['success'] ? 200 : 500);
    }

    public function getAllProdutos(Request $request){
        $termo = $request->input('q');

        $produtos = $this->produtos_repository->getAllProdutosSelect($termo);

        return response()->json($produtos);
    }
}
