# Projeto Laravel de Gestão de Vendas

Este é um projeto Laravel desenvolvido para gerenciar vendas de produtos, permitindo aos usuários criar, visualizar, editar e excluir vendas, além de possibilitar o parcelamento das compras.

## Requisitos

- PHP >= 7.4
- Composer
- Node.js
- Banco de Dados MySQL

## Instalação

1. Clone o repositório do projeto:

    ```bash
    git clone https://github.com/ArthurMends777/PageSales.git
    ```

2. Acesse o diretório do projeto:

    ```bash
    cd PageSales
    ```

3. Instale as dependências do PHP via Composer:

    ```bash
    composer install
    ```

4. Copie o arquivo `.env.example` e renomeie para `.env`:

    ```bash
    cp .env.example .env
    ```

5. Gere a chave de aplicação do Laravel:

    ```bash
    php artisan key:generate
    ```

6. Configure o arquivo `.env` com as informações do seu banco de dados.

7. Execute as migrações para criar as tabelas do banco de dados:

    ```bash
    php artisan migrate
    ```
    após isso abra seu banco de dados e execute o comando sql que está na pasta "MySQL"

8. Inicie o servidor de desenvolvimento:

    ```bash
    php artisan serve
    ```

9. Acesse o aplicativo no navegador em `http://localhost:8000`.

