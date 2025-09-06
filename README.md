# Como rodar o sistema localmente

Este repositório contém uma aplicação [Laravel](https://laravel.com) com frontend em React e Vite.

## Pré-requisitos
- PHP 8.2+
- [Composer](https://getcomposer.org/)
- Node.js e npm

## Passo a passo
1. Entre na pasta do projeto e acesse o diretório `src`:
   ```bash
   cd src
   ```
2. Copie o arquivo de exemplo de ambiente:
   ```bash
   cp .env.example .env
   ```
3. Instale as dependências do PHP e do Node:
   ```bash
   composer install
   npm install
   ```
4. Gere a chave da aplicação e execute as migrações:
   ```bash
   php artisan key:generate
   php artisan migrate
   ```

## Executando
Para iniciar o servidor de desenvolvimento, execute:
```bash
composer run dev
```

O sistema ficará disponível em [http://localhost:8000](http://localhost:8000).
