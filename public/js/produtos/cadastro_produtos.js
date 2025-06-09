$(document).ready(function(){

    $('#form-cadastro-produto').on('submit', async function(e) {
        e.preventDefault();
    
        const dados = getFormData($(this));
    
        try {
            await ApiService.post('/produtos', dados); // Rota da sua API Laravel
            Swal.fire('Sucesso', 'Cliente cadastrado com sucesso!', 'success');
    
            window.location.href = '/produtos';
        } catch (error) {
            handleApiError(error); // Exibe erros de validação ou outros
        }
    });
    
});