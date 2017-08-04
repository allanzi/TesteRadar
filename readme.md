Requerimentos
============

* PHP >= 5.3.7
* Extensões para rodar o Frameword Laravel - [Documentação do Laravel](https://laravel.com/docs/5.3/installation)
* Composer
* Mysql ou Postgres

Instalação
============

    git clone git@github.com:allanzi/TesteRadar.git


Como usar
=====

Crie um arquivo .env com as variáveis de ambiente

    cp .env.example .env
    
Instale as dependências (necessário composer e node instalado)

    composer install
    npm i
    
Rode as migrations

    php artisan migrate
    
Suba o servidor

    php artisan serve

E voilá.


Credits
=======

* [Allan Santos](https://br.linkedin.com/in/allanzi)