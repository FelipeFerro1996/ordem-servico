$(document).ready(function() {
    $('#login-form').on('submit', async function(e) {
        e.preventDefault();

        const email = $('#email').val();
        const password = $('#password').val();
        try {
            const response = await ApiService.login(email, password);
            
            localStorage.setItem('token', response.data.token); // Armazena o token
            localStorage.setItem('userTipo', response.data.user.role); // Armazena o token
            window.location.href = '/ordem-servico'; // Redireciona após login
        } catch (error) {
            handleApiError(error);
        }
    });

    // Proteção de rota
    const token = localStorage.getItem('token');
    if (!token && window.location.pathname !== '/login') {
        window.location.href = '/login';
    }
});
