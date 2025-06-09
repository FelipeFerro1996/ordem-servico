$(document).ready(function(){
    carregarClientes();

    $('body').on('click', '#paginacao a.page-link', function (e) {
        e.preventDefault();
        const pagina = $(this).data('page');
        carregarClientes(pagina);
    });

    $('body').on('click', '.btn-deletar', function () {
        const id = $(this).data('id');
        deletarCliente(id);
    });

});

async function carregarClientes(pagina = 1) {
    try {
        const response = await ApiService.get(`/clientes?page=${pagina}`);
        const clientes = response.data.dados.data;
        const meta = response.data.dados;

        const tbody = $('#tabela-clientes tbody');
        tbody.empty();

        clientes.forEach(cliente => {
            const linha = `
                <tr>
                    <td>${cliente.nome}</td>
                    <td><i class="bi bi-trash text-danger btn-deletar" data-id="${cliente.id}" style="cursor: pointer;"></i></td>
                </tr>
            `;
            tbody.append(linha);
        });

        renderizarPaginacao(meta);

    } catch (error) {
        handleApiError(error);
    }
}

async function deletarCliente(id) {
    const confirmado = await Swal.fire({
        title: 'Tem certeza?',
        text: "Essa ação não pode ser desfeita!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim, deletar!',
        cancelButtonText: 'Cancelar'
    });

    if (confirmado.isConfirmed) {
        try {
            await ApiService.delete(`/clientes/${id}`);
            Swal.fire('Deletado!', 'O registro foi removido com sucesso.', 'success');
            carregarClientes(); // atualiza a lista
        } catch (error) {
            handleApiError(error);
        }
    }
}