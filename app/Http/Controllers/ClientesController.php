<?php

namespace App\Http\Controllers;

use App\Http\DTOs\ClientesDTO;
use App\Http\DTOs\EnderecoDTO;
use App\Http\interfaces\ClientesInterface;
use App\Http\Requests\ClientesRequest;
use Illuminate\Http\Request;

class ClientesController extends Controller
{

    public function __construct(
        public ClientesInterface $clientes_repository
    ) {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = $this->clientes_repository->getAllClientes();

        return response()->json([
            'dados'=>$clientes
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientesRequest $request)
    {
        $enderecoDTO = new EnderecoDTO(
            rua: $request->input('rua'),
            numero: $request->input('numero'),
            bairro: $request->input('bairro'),
            cidade: $request->input('cidade'),
            estado: $request->input('estado'),
            cep: $request->input('cep')
        );
    
        $clienteDto = new ClientesDTO(
            nome: $request->input('nome'),
            cpf: $request->input('cpf'),
            enderecoDto: $enderecoDTO
        );
        //$clienteDto = ClientesDTO::fromArray($request->validated());

        $response = $this->clientes_repository->createUpdateCliente($clienteDto);

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
    public function update(ClientesRequest $request, $id)
    {

        $enderecoDTO = new EnderecoDTO(
            rua: $request->input('rua'),
            numero: $request->input('numero'),
            bairro: $request->input('bairro'),
            cidade: $request->input('cidade'),
            estado: $request->input('estado'),
            cep: $request->input('cep')
        );
    
        $clienteDto = new ClientesDTO(
            nome: $request->input('nome'),
            cpf: $request->input('cpf'),
            enderecoDto: $enderecoDTO
        );
        //$clienteDto = ClientesDTO::fromArray($request->validated());

        $response = $this->clientes_repository->createUpdateCliente(dto:$clienteDto, id:$id);

        return response()->json($response, $response['success'] ? 200 : 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = $this->clientes_repository->delete($id);

        return response()->json($response, $response['success'] ? 200 : 500);
    }
}
