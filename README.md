# Requisitos do projeto
Este projeto é uma SPA desenvolvida em Laravel 8 e Vue.js 2.

### Cadastro de produtos com os seguintes campos obrigatórios:
- Nome
- SKU
- Quantidade Inicial

### Movimentação de produtos
- SKU
- Quantidade (para adicionar ou remover)

### Histórico
- Retornar json com uma lista das movimentações realizadas
- SKU
- Quantidade (adicionada ou removida)
- Data/hora (que ocorreu a movimentação)

# Dependências
- Vuex
- Vue-router
- Vuetify
- Vue-snotify
- Telescope

# Executando o projeto

- npm install
- npm run dev

Em outro terminal, executar os comandos abaixo:
- docker-compose up -d
- docker-compose exec -it my_app bash
- cp .env.example .env
- composer install
- php artisan key:generate
- php artisan db:seed
