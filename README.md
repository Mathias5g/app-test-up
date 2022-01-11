v<h1 align="center">👨‍💻 Teste PHP Mediano 👨‍💻</h1>

## Contexto

Deve ser criado um CRUD de usuários para avaliação do candidato. Os dados devem ser salvos em duas tabelas no banco de dados. O código deve ser escrito utilizando o framework Laravel. Os dados devem ser salvos em um banco de dados, preferencialmente Mysql, utilizar algum framework de Frontend para ajudar no layout (bootstrap). O endereço do usuário deve ser preencho via AJAX, ou seja, o cliente digitou o CEP e o restante dos campos devem ser preenchidos, para executar esta tarefa, utilize a API viacep (https://viacep.com.br/). Será avaliada a lógica utilizada, organização do código, validações dos dados tanto no frontend como no backend.

##Resultado

- ### Requisitos
Ter instalado as seguintes ferramentas
- [Composer](https://getcomposer.org/download/)
- [Node.js](https://nodejs.org/en/download/)
- [Yarn](https://classic.yarnpkg.com/lang/en/docs/install/#windows-stable)
- [Git](https://git-scm.com/downloads)

##  Instalação

1. Clone o projeto
```shell
    git clone https://github.com/Mathias5g/app-test-up.git
```

2. Baixa os pacotes composer
```shell
    composer install
```

3. Baixe os pacotes npm
```shell
    yarn install 
```

## Como rodar
1. Primeiro deverá alterar ``.env.example`` na raiz do projeto para ``.env``, alterar as linhas a seguir para o seu
   ambiente de banco de dados
```dotenv
DB_DATABASE=app_test_up
DB_USERNAME=root
DB_PASSWORD=root
```

2. Rodar a migration para gerar as tebelas utilziando o seguinte comando
```shell
php artisan migrate
```

3. Rodar o servidor localmente utilizando o seguinte comando
```shell
php artisan serve
```

4. Acessar o servidor na url ``http://localhost:8000/register``


## Bibliotecas utilizadas
Algumas bibliotecas foram utilizadas a fim de aprimorar a performance e usabilidade, todas elas estão listadas abaixo:
```json
{
    "laravel/framework": "^8.65",
    "@inertiajs/inertia": "^0.10.0",
    "@inertiajs/inertia-vue3": "^0.5.1",
    "moment": "^2.29.1",
    "tailwindcss": "^2.0.1",
    "vue": "^3.0.5"
}
```
Lista completa em ``composer.json`` e ``package.json``

<p align="center">👨‍💻 Never Stop Learning 👨‍💻</p>
