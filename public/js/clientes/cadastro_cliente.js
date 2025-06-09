$(document).ready(function(){

    $('#form-cadastro-cliente').on('submit', async function(e) {
        e.preventDefault();
    
        const dados = getFormData($(this));
    
        try {
            await ApiService.post('/clientes', dados); // Rota da sua API Laravel
            Swal.fire('Sucesso', 'Cliente cadastrado com sucesso!', 'success');
    
            window.location.href = '/clientes';
        } catch (error) {
            handleApiError(error); // Exibe erros de validação ou outros
        }
    });

    $('#cep').on('blur', async function () {
        let cep = $(this).val().replace(/\D/g, ''); // Remove tudo que não é número

        if (cep.length !== 8) {
            return;
        }

        try {
            const response = await axios.get(`https://viacep.com.br/ws/${cep}/json/`);

            if (response.data.erro) {
                return;
            }

            // Preenche os campos
            $('#rua').val(response.data.logradouro);
            $('#bairro').val(response.data.bairro);
            $('#cidade').val(response.data.localidade);
            $('#estado').val(response.data.uf);

        } catch (error) {
        }
    });
    
});