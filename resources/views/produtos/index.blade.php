@extends('layout.main')

@section('content')

    <div class="card">
        <div class="card-header d-flex justify-content-beteween">
            Produtos

            <a class="btn btn-primary ms-auto" href="{{ route('cadastroProduto') }}">
                <i class="bi bi-plus"></i>
                Novo
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-center" id="tabela-produtos">
                    <thead>
                        <tr>
                            <td>Código</td>
                            <td>Descricao</td>
                            <td>Status</td>
                            <td>Tempo de Garantia</td>
                            <td scope="col">Ações</td>
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
    <script src="{{ asset('js/produtos/lista_produtos.js') }}"></script>
@endpush