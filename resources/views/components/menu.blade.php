<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Ordem de Serviço</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="menu">
                <li class="nav-item menu-item" style="display: none" data-role="admin">
                    <a href="{{ route('CadastroOrdemServico') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item menu-item" style="display: none" data-role="admin">
                    <a href="{{ route('listaClientes') }}" class="nav-link">Clientes</a>
                </li>
                <li class="nav-item menu-item" style="display: none" data-role="admin">
                    <a href="{{ route('listaProdutos') }}" class="nav-link">Produtos</a>
                </li>
                <li class="nav-item menu-item" style="display: none" data-role="admin user">
                    <a href="{{ route('listaOrdensServico') }}" class="nav-link">Ordem de Serviço</a>
                </li>
            </ul>
        </div>

        <div class="d-flex ms-auto align-items-center gap-3">
            <button class="btn btn-sm btn-outline-secondary" id="btn-darkmode-toggle" title="Alternar tema">
                <i class="bi bi-moon"></i>
            </button>

            <button class="btn btn-sm btn-danger" id="btn-logout">
                <i class="bi bi-box-arrow-right"></i> Sair
            </button>
        </div>
    </div>
</nav>