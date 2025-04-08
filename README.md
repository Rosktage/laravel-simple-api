
# Laravel Simple API

API RESTful desenvolvida com Laravel 12.x, PHP 8.4 e Laravel Herd, com autenticação baseada em token utilizando Sanctum.

## Ambiente

- **PHP**: 8.4
- **Laravel**: 12.x
- **Servidor local**: Laravel Herd (URL: `http://laravel-simple-api.test`)
- **Banco de dados**: SQLite (por padrão)

---

## Autenticação

A autenticação é feita via **Laravel Sanctum** utilizando **tokens pessoais**. Para autenticar-se:

### POST `/api/login`

Gera um token de acesso:

**Request JSON:**

{
  "email": "admin@test.com",
  "password": "Admin@123"
}

**Response:**

{
  "token": "<TOKEN>"
}

Use este token no header das próximas requisições:

Authorization: Bearer <TOKEN>
Accept: application/json

**Exemplo CURL:**

curl -X POST http://laravel-simple-api.test/api/login \
     -H "Accept: application/json" \
     -H "Content-Type: application/json" \
     -d '{ "email": "admin@test.com", "password": "Admin@123" }'

---

## Endpoints da API

### Criar Usuário

`POST /api/users`

Cria um novo usuário.

**Requer token de autenticação.**

### Listar Usuários

`GET /api/users`

Retorna a lista de usuários.

**Requer token de autenticação.**

### Obter Usuário por ID

`GET /api/users/{id}`

Retorna os dados de um usuário.

**Requer token de autenticação.**

### Atualizar Usuário

`PUT /api/users/{id}`

Atualiza os dados de um usuário.

**Requer token de autenticação.**

### Deletar Usuário

`DELETE /api/users/{id}`

Deleta um usuário.

**Requer token de autenticação.**

---

## Testes

Use ferramentas como **Postman** ou **Insomnia** para testar os endpoints.

Certifique-se de estar autenticado com o token no header:

Authorization: Bearer <TOKEN>
Accept: application/json

---

## Seeders

A aplicação já conta com um usuário padrão:

- Email: `admin@test.com`
- Senha: `Admin@123`
