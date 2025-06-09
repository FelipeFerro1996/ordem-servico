$(document).ready(function(){
    carregarProdutos();

    $(document).on('click', '#paginacao a.page-link', function (e) {
        e.preventDefault();
        const pagina = $(this).data('page');
        carregarProdutos(pagina);
    });

    $('body').on('click', '.btn-deletar', function () {
        const id = $(this).data('id');
        deletarProdutos(id);
    });

});

async function carregarProdutos(pagina = 1) {
    try {
        const response = await ApiService.get(`/produtos?page=${pagina}`);
        const produtos = response.data.dados.data;
        const meta = response.data.dados;

        const tbody = $('#tabela-produtos tbody');
        tbody.empty();

        produtos.forEach(produto => {
            const linha = `
                <tr>
                    <td>${produto.codigo}</td>
                    <td>${produto.descricao}</td>
                    <td>${produto.status}</td>
                    <td>${produto.tempo_garantia}</td>
                    <td><i class="bi bi-trash text-danger btn-deletar" data-id="${produto.id}" style="cursor: pointer;"></i></td>
                </tr>
            `;
            tbody.append(linha);
        });

        renderizarPaginacao(meta);

    } catch (error) {
        handleApiError(error);
    }
}

async function deletarProdutos(id) {
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
            await ApiService.delete(`/produtos/${id}`);
            Swal.fire('Deletado!', 'O registro foi removido com sucesso.', 'success');
            carregarProdutos(); // atualiza a lista
        } catch (error) {
            handleApiError(error);
        }
    }
}
