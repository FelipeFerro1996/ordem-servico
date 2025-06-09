@extends('layout.main')

@section('content')
    
    <div class="card">
        <div class="card-header ">
            Cadastro Produto
        </div>

        <div class="card-body">
            <form id="form-cadastro-produto">
                <div class="row">
                    <div class="col-md-12 p-2">
                        <label class="form-label" for="descricao">Descrição:</label>
                        <input class="form-control descricao" type="text" name="descricao" id="descricao" required>
                    </div>

                    <div class="col-md-4 p-2">
                        <label class="form-label" for="codigo">Código:</label>
                        <input class="form-control codigo" type="text" name="codigo" id="codigo" required>
                    </div>

                    <div class="col-md-4 p-2">
                        <label class="form-label" for="status">Status:</label>
                        <select id="status" name="status" class="form-select">
                            <option value="ativo">Ativo</option>
                            <option value="inativo">Inativo</option>
                        </select>
                    </div>

                    <div class="col-md-4 p-2">
                        <label class="form-label" for="tempo_garantia">Tempo garantia (meses):</label>
                        <input class="form-control tempo_garantia" type="number" name="tempo_garantia" id="tempo_garantia" required>
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
    <script src="{{ asset('js/produtos/cadastro_produtos.js') }}"></script>
@endpush