# Serviços de Carteira Digital de Transferência

Na pasta `cadastro` contém o serviço de cadastro, aonde o usuário pode se cadastrar e criar sua carteira digital


Na pasta `movimentação` contém o serviço de movimentação, aonde o usuário pode depositar dinheiro e transferir dinheiro para outros usuários


# 1 - Iniciar containers 

Comando `docker-compose up -d --build`

# 2 - Instalar Dependência `Composer` e copiar .env.example para .env

# 3 - Rodar Migration e Seed

Comando `docker exec -it services_cadastro-service_1  php artisan migrate`

Comando `docker exec -it services_cadastro-service_1  php artisan db:seed`

Comando `docker exec -it services_movimentacao-service_1  php artisan migrate`

# 4 - Rodar os testes
Comando `docker exec -it services_cadastro-service_1  vendor/bin/phpunit`


# Documentação

Cadastro `http://localhost:8033/api/documentation`

Movimentação `http://localhost:8034/api/documentation`
