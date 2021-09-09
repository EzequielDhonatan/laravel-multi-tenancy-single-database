# LARAVEL MULTI TENANCY SINGLE DATABASE

Sistema com múltiplos clientes, todos na mesma aplicação e no mesmo database (Banco de dados).

<br>

### Instalação

Clonar Projeto
```sh
git clone https://github.com/ezequieldhonatan/laravel-multi-tenancy-single-database
```

Acessar o projeto
```sh
cd laravel-multi-tenancy-single-database
```

Criar o Arquivo .env
```sh
cp .env.example .env
```

Subir os containers do projeto
```sh
docker-compose up -d
```

Acessar o container
```sh
docker-compose exec laravel_multi_tenancy_singel_database bash
```

Instalar as dependências do projeto
```sh
composer install
```

Gerar a key do projeto Laravel
```sh
php artisan key:generate
```

Acessar o projeto
[http://localhost:8000](http://localhost:8000)
