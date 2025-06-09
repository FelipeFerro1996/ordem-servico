$(document).ready(function(){
    $('#form-cadastro-ordem-servico').on('submit', async function(e) {
        e.preventDefault();
    
        const dados = getFormData($(this));
    
        try {
            await ApiService.post('/ordem-servico', dados); // Rota da sua API Laravel
            Swal.fire('Sucesso', 'Ordem de Serviço cadastrado com sucesso!', 'success');
    
            window.location.href = '/ordem-servico';
        } catch (error) {
            handleApiError(error); // Exibe erros de validação ou outros
        }
    });
})

$('#produtos_id').select2({
    theme: 'bootstrap4',
    placeholder: 'Digite ao menos 3 letras',
    minimumInputLength: 3,
    ajax: {
        url: `${API_BASE_URL}/produtos-busca`,
        dataType: 'json',
        delay: 300,
        data: function (params) {
            return {
                q: params.term
            };
        },
        transport: function (params, success, failure) {
            // Adiciona o token manualmente nos headers
            const token = getToken();
            const request = $.ajax({
                url: params.url,
                type: 'GET',
                data: params.data,
                headers: {
                    'Authorization': `Bearer ${token}`
                },
                success: success,
                error: failure
            });
            return request;
        },
        processResults: function (data) {
            return {
                results: data.map(produto => ({
                    id: produto.id,
                    text: `${produto.codigo} - ${produto.descricao}`
                }))
            };
        },
        cache: true
    }
});

