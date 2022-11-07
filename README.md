# Instruções para execução do projeto

- Após clonar o repositório, execute o comando `composer install` para instalar todas as dependências do Laravel
- Configure o arquivo `.env` (só é necessário configurar a base de dados)
- Execute o comando `php artisan migrate` para importar a tabela ao BD
- Execute o comando `php artisan db:seed --class=VeiculosSeeder` para adicionar veículos de exemplo
- Execute o comando `php artisan serve` e acesse a aplicação em seu navegador através do endereço `localhost:8000`