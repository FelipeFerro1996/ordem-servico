@extends('layout.main')

@section('content')
    
    <div class="card">
        <div class="card-header ">
            Cadastro Ordem Serviço
        </div>

        <div class="card-body">
            <form id="form-cadastro-ordem-servico">

                <div class="row">
                    <div class="col-md-4 p-2">
                        <label class="form-label" for="cpf_consumidor">CPF:</label>
                        <input class="form-control cpf" type="text" name="cpf_consumidor" id="cpf_consumidor" required>
                    </div>

                    <div class="col-md-8 p-2">
                        <label class="form-label" for="nome_consumidor">Nome:</label>
                        <input class="form-control" type="text" name="nome_consumidor" id="nome_consumidor" required>
                    </div>
                    
                    <div class="col-md-4 p-2">
                        <label class="form-label" for="numero">Numero:</label>
                        <input class="form-control cpf" type="text" name="numero" id="numero" required>
                    </div>

                    <div class="col-md-4 p-2">
                        <label class="form-label" for="data_abertura">Data abertura:</label>
                        <input class="form-control" type="date" name="data_abertura" id="data_abertura" required>
                    </div>

                    <div class="col-md-4 p-2">
                        <label class="form-label" for="produtos_id">Produto:</label>
                        <select id="produtos_id" name="produtos_id" style="width: 100%"></select>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-3 p-2">
                        <button class="btn btn-success" type="submit">
                            <i class="bi bi-floppy"></i>
                            Salvar
                        </button>
                    </div>
                </div>
                
            </form>
        </div>

    </div>

@endsection

@push('javascript')
    <script src="{{ asset('js/ordem_servico/cadastro_ordem_servico.js') }}"></script>
@endpush