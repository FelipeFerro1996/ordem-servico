@extends('layout.main')

@section('content')

    <div class="card">
        <div class="card-header d-flex justify-content-beteween">
            Clientes

            <a class="btn btn-primary ms-auto" href="{{ route('CadastroOrdemServico') }}">
                <i class="bi bi-plus"></i>
                Novo
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-center" id="tabela-ordem-servico">
                    <thead>
                        <tr>
                            <td scope="col">Número</td>
                            <td scope="col">Cliente</td>
                            <td scope="col">Produto</td>
                            <td scope="col">Data Abertura</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="5">nenhum registro encontrado..</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <nav class="d-flex justify-content-center">
                <ul class="pagination" id="paginacao"></ul>
            </nav>
        </div>
    </div>

@endsection

@push('javascript')
    <script src="{{ asset('js/ordem_servico/list_ordens_servicos.js') }}"></script>
@endpush