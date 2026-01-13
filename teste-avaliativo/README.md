## 🚀 Como instalar o projeto

1. Clone o repositório:
   `git clone [url-do-seu-repo]`

2. Instale as dependências:
   `composer install`

3. Prepare o ambiente:
   - Copie o arquivo de exemplo: `cp .env.example .env`
   - Gere a chave da aplicação: `php artisan key:generate`
   - Configure seu banco de dados no `.env`

4. Rode as migrações:
   `php artisan migrate`

5. Inicie o servidor:
   `bpm run dev`
   `php artisan serve`