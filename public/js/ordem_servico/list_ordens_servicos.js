$(document).ready(function(){
    CarregarOrdens();

    $(document).on('click', '#paginacao a.page-link', function (e) {
        e.preventDefault();
        const pagina = $(this).data('page');
        CarregarOrdens(pagina);
    });

});
async function CarregarOrdens(pagina = 1) {
    try {
        const response = await ApiService.get(`/lista-ordens-servicos?page=${pagina}`);
        const ordem = response.data.dados.data;
        const meta = response.data.dados;

        const tbody = $('#tabela-ordem-servico tbody');
        tbody.empty();

        ordem.forEach(ordem => {
            const linha = `
                <tr>
                    <td>${ordem.numero}</td>
                    <td>${ordem.cliente.nome}</td>
                    <td>${ordem.produto.descricao}</td>
                    <td>${ordem.data_abertura}</td>
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

