const API_BASE_URL = 'http://localhost/api';

function getToken() {
    return localStorage.getItem('token');
}

const api = axios.create({
    baseURL: API_BASE_URL,
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
    }
});

api.interceptors.request.use(config => {
    const token = getToken();
    if (token) {
        config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
});

const ApiService = {
    login: async (email, password) => {
        return await api.post('/login-token', { email, password });
    },
    getUser: async () => {
        return await api.get('/me');
    },
    get: async (endpoint) => {
        return await api.get(endpoint);
    },
    post: async (endpoint, data) => {
        return await api.post(endpoint, data);
    },
    put: async (endpoint, data) => {
        return await api.put(endpoint, data);
    },
    delete: async (endpoint) => {
        return await api.delete(endpoint);
    }
};

window.ApiService = ApiService; // Deixa acessível globalmente
