@extends('layout.main')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header">
                Login
            </div>
            <div class="card-body">
                <form id="login-form">
                    <div class="row">
                        <div class="col-12 p-2">
                            <label class="form-label" for="email">E-mail:</label>
                            <input class="form-control" type="email" name="email" id="email" required>
                        </div>
                        <div class="col-12 p-2">
                            <label class="form-label" for="password">Senha:</label>
                            <input class="form-control" type="password" name="password" id="password" required>
                        </div>
    
                        <div class="col-md-3 p-2">
                            <button class="btn btn-success" type="submit">
                                <i class="bi bi-floppy"></i>
                                Entrar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script src="{{ asset('js/login/form_login.js') }}"></script>
@endpush