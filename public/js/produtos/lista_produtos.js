$(document).ready(function(){
    carregarProdutos();

    $(document).on('click', '#paginacao a.page-link', function (e) {
        e.preventDefault();
        const pagina = $(this).data('page');
        carregarProdutos(pagina);
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
                    <td><i class="bi bi-trash text-danger"></i></td>
                </tr>
            `;
            tbody.append(linha);
        });

        renderizarPaginacao(meta);

    } catch (error) {
        handleApiError(error);
    }
}

