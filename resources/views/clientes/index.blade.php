@extends('layout.main')

@section('content')

    <div class="card">
        <div class="card-header d-flex justify-content-beteween">
            Clientes

            <a class="btn btn-primary ms-auto" href="{{ route('cadastroCliente') }}">
                <i class="bi bi-plus"></i>
                Novo
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-center" id="tabela-clientes">
                    <thead>
                        <tr>
                            <td scope="col">Nome</td>
                            <td scope="col">Ações</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2">nenhum registro encontrado..</td>
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
    <script src="{{ asset('js/clientes/lista_clientes.js') }}"></script>
@endpush