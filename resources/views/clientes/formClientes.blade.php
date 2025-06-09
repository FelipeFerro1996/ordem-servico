@extends('layout.main')

@section('content')
    
    <div class="card">
        <div class="card-header ">
            Cadastro Cliente
        </div>

        <div class="card-body">
            <form id="form-cadastro-cliente">

                <div class="row">
                    <div class="col-md-4 p-2">
                        <label class="form-label" for="cpf">CPF:</label>
                        <input class="form-control cpf" type="text" name="cpf" id="cpf" required>
                    </div>
                    <div class="col-md-8 p-2">
                        <label class="form-label" for="nome">Nome:</label>
                        <input class="form-control" type="text" name="nome" id="nome" required>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-4 p-2">
                        <label class="form-label" for="cep">CEP:</label>
                        <input class="form-control cep" type="text" name="cep" id="cep" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 p-2">
                        <label class="form-label" for="rua">Rua:</label>
                        <input class="form-control rua" type="text" name="rua" id="rua" required>
                    </div>
                    <div class="col-md-4 p-2">
                        <label class="form-label" for="numero">Numero:</label>
                        <input class="form-control numero" type="text" name="numero" id="numero" required>
                    </div>
                    <div class="col-md-4 p-2">
                        <label class="form-label" for="bairro">Bairro:</label>
                        <input class="form-control bairro" type="text" name="bairro" id="bairro" required>
                    </div>
                    <div class="col-md-4 p-2">
                        <label class="form-label" for="cidade">Cidade:</label>
                        <input class="form-control cidade" type="text" name="cidade" id="cidade" required>
                    </div>
                    <div class="col-md-4 p-2">
                        <label class="form-label" for="estado">Estado:</label>
                        <input class="form-control estado" type="text" name="estado" id="estado" required>
                    </div>
                </div>

                <div class="row">

                    <div class="row">
                        <div class="col-md-3 p-2">
                            <button class="btn btn-success" type="submit">
                                <i class="bi bi-floppy"></i>
                                Salvar
                            </button>
                        </div>
                    </div>
                </div>
                
            </form>
        </div>

    </div>

@endsection

@push('javascript')
    <script src="{{ asset('js/clientes/cadastro_cliente.js') }}"></script>
@endpush