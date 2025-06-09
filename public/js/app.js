$(document).ready(async function(){
    if (window.location.pathname !== '/login') {
        const autenticado = await validarTokenComBackend();
        if (autenticado) {
            aplicarMenusPorTipo();
        }
    }
})

$(document).ready(function() {

    $('#btn-logout').on('click', function () {
        redirecionarParaLogin();
    });

    $('#btn-darkmode-toggle').on('click', function () {
        const currentTheme = $('html').attr('data-bs-theme') || 'light';
        const newTheme = currentTheme === 'light' ? 'dark' : 'light';
    
        $('html').attr('data-bs-theme', newTheme);
    
        // Salva preferência no localStorage
        localStorage.setItem('theme', newTheme);
    
        // Troca o ícone
        const icon = newTheme === 'dark' ? 'bi-sun' : 'bi-moon';
        $(this).find('i').attr('class', `bi ${icon}`);
    });
    
    const savedTheme = localStorage.getItem('theme') || 'light';
    $('html').attr('data-bs-theme', savedTheme);

    // Ajusta ícone do botão
    const icon = savedTheme === 'dark' ? 'bi-sun' : 'bi-moon';
    $('#btn-darkmode-toggle i').attr('class', `bi ${icon}`);
    
    $('.cpf').mask('000.000.000-00');
    $('.cep').mask('00000-000');
});

function handleApiError(error) {
    if (!error.response) {
        // Erro de conexão ou algo inesperado
        Swal.fire('Erro', 'Erro de conexão com o servidor.', 'error');
        return;
    }

    const status = error.response.status;

    // 422 - Erros de validação (FormRequest)
    if (status === 422) {
        const errors = error.response.data.errors;
        let errorMessages = '';

        for (let field in errors) {
            errors[field].forEach(msg => {
                errorMessages += `• ${msg}<br>`;
            });
        }

        Swal.fire({
            icon: 'error',
            title: 'Erros de validação',
            html: errorMessages
        });

    // 401 - Não autorizado
    } else if (status === 401) {
        Swal.fire('Não autorizado', 'Você precisa estar logado.', 'warning');
        window.location.href = '/login';
    // 403 - Proibido
    } else if (status === 403) {
        Swal.fire('Acesso negado', 'Você não tem permissão para isso.', 'warning');

    // 404 - Não encontrado
    } else if (status === 404) {
        Swal.fire('Não encontrado', 'O recurso solicitado não existe.', 'error');

    // Outros erros
    } else {
        const message = error.response.data.message || 'Erro inesperado.';
        Swal.fire('Erro', message, 'error');
    }
}

function aplicarMenusPorTipo() {
    const tipo = localStorage.getItem('userTipo'); // deve ser 'admin' ou 'user'
    
    if (!tipo) {
        return;
    }

    $('.menu-item').each(function () {
        const permitido = $(this).data('role'); // ex: 'admin', 'admin user', etc.

        const permissoes = permitido.split(' ');

        if (permissoes.includes(tipo)) {
            $(this).show();
        }
    });
}


function getFormData(formSelector) {
    const array = $(formSelector).serializeArray();
    const data = {};
    array.forEach(item => {
        data[item.name] = item.value;
    });
    return data;
}

function renderizarPaginacao(meta) {
    const paginacao = $('#paginacao');
    paginacao.empty();

    const { current_page, last_page } = meta;

    // Botão anterior
    if (current_page > 1) {
        paginacao.append(`<li class="page-item"><a class="page-link" href="#" data-page="${current_page - 1}">&laquo;</a></li>`);
    }

    // Páginas
    for (let i = 1; i <= last_page; i++) {
        const ativo = i === current_page ? 'active' : '';
        paginacao.append(`<li class="page-item ${ativo}"><a class="page-link" href="#" data-page="${i}">${i}</a></li>`);
    }

    // Botão próximo
    if (current_page < last_page) {
        paginacao.append(`<li class="page-item"><a class="page-link" href="#" data-page="${current_page + 1}">&raquo;</a></li>`);
    }
}

async function validarTokenComBackend() {
    const token = localStorage.getItem('token');
    
    if (!token) {
        redirecionarParaLogin();
        return false;
    }

    try {
        const response = await axios.get('http://localhost/api/me', {
            headers: {
                Authorization: `Bearer ${token}`
            }
        });

        // Se o backend responder com sucesso, salva o tipo de usuário
        const tipo = response.data.role || 'user'; // ajuste conforme seu modelo de usuário

        localStorage.setItem('userTipo', tipo);

        return true;

    } catch (error) {
        redirecionarParaLogin();
        return false;
    }
}

function redirecionarParaLogin() {

    if (localStorage.getItem('token')) {
        localStorage.removeItem('token');
    }

    if (localStorage.getItem('userTipo')) {
        localStorage.removeItem('userTipo');
    }

    window.location.href = '/login'; // ajuste conforme sua rota
}

