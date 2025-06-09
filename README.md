# 🧰 Sistema de Gestão com Laravel + JWT + jQuery

Este projeto é uma aplicação web construída em Laravel com autenticação via JWT, consumo de API com jQuery + Axios, gerenciamento de usuários e permissões (admin e user), máscaras de campos, integração com Select2, Bootstrap 5 com suporte a tema escuro e muito mais.

---

## 🚀 Tecnologias

- ✅ Laravel 10+
- ✅ PHP 8.1+
- ✅ MySQL
- ✅ JWT (tymon/jwt-auth)
- ✅ jQuery + Axios
- ✅ Bootstrap 5 + Bootstrap Icons
- ✅ Select2 (busca remota)
- ✅ SweetAlert2 (alertas de erro e sucesso)
- ✅ jQuery Mask Plugin
- ✅ Docker (opcional)

---

## ⚙️ Instalação

### 1. Clonar o repositório

```bash
git clone https://github.com/FelipeFerro1996/ordem-servico.git
cd seu-projeto
```

### 2. Instalar dependências PHP

```bash
composer install
```

### 3. Copiar `.env` e gerar chave

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Criar banco de dados e configurar `.env`

Atualize as credenciais no `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=seu_banco
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Gerar JWT Secret

```bash
php artisan jwt:secret
```

---

## 📦 Migrações e Seeders

```bash
php artisan migrate --seed
```

---

## 💻 Frontend

- Os formulários e listagens são renderizados por Blade (`routes/web.php`)
- A comunicação com a API usa Axios (com JWT armazenado no `localStorage`)
- Máscaras de CPF e CEP usando `jQuery Mask Plugin`
- Select2 para busca remota de produtos via AJAX
- Paginação com Bootstrap + API Laravel Paginate

---

## 🧑 Autor

- **Seu Nome**
- GitHub: [@FelipeFerro1996](https://github.com/FelipeFerro1996)

---

## 📄 Licença

Este projeto está licenciado sob a [MIT License](LICENSE).