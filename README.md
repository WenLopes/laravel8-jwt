
# Laravel 8 - JWT

Api criada em Laravel na versão 8, Docker para infraestrutura e MySql como banco de dados, utilizando a biblioteca **tymon/jwt-auth**.

Nesse projeto foi criada uma Model customizada para autenticação (no padrão da biblioteca, a Model *User* é utilizada como padrão ) e uma Middleware para tratar as exceptions e então padronizar o retorno das respostas das requisições.
## Instalação 

### 1. Clonar o projeto

```bash
git clone https://github.com/WenLopes/docker-react-laravel.git
```


### 2. Configure as variáveis de ambiente
*Na **raiz do projeto**, crie o arquivo .env do **DOCKER** utilizando o arquivo .env.example como base. Modifique o valor das variáveis de acordo com a sua preferência.*

```bash
cp .env_example .env
```


*(Opcional) Se desejar, altere as portas padrão da aplicação no arquivo .env*

### 3. Na raíz do projeto, execute o comando:
```bash
docker-compose up --build
```


### 4. Instalando as dependências e configurando a API
*4.1 Instale as dependências do Laravel executando o comando na **raiz do projeto**:*
```bash
docker-compose exec php7_base composer install
```


*4.2 Corriga as permissões dos diretórios, executando os comandos abaixo no diretório **api**:*

```bash
sudo chgrp -R www-data storage bootstrap/cache
```


```bash
sudo chmod -R ug+rwx storage bootstrap/cache
```


*4.3 Crie o arquivo .env do diretório **api**, utilizando o .env.example como base:*

```bash
cp .env_example .env
```


*(Opcional) Se desejar, altere o email e senha padrão do funcionário que irá representar nosso usuário do banco de dados*

*4.4 Gere a chave do projeto executando o comando na **raiz do projeto**:*

```bash
docker-compose exec php7_base php artisan key:generate
```


*4.5 Gere a chave do JWT executando o comando na **raiz do projeto**:*

```bash
docker-compose exec php7_base php artisan jwt:secret
```


*4.6 Rode as migrations e Seeders executando o comando na **raiz do projeto**:*

```bash
docker-compose exec php7_base php artisan migrate:refresh --seed
```

## Utilização

O arquivo **config/jwt.php** na api possui a índice ttl (representa em minutos o tempo de vida útil do token) definido como 1. Dessa forma, após gerar um token pela rota de login, o mesmo vai durar 60 segundos até que expire.

Mantendo essa configuração, será possível realizar o teste de resposta com token atualizado que nossa Middleware está provendo.

Para execução de mais testes, execute um dos passos abaixo:
* Envie uma requisição para alguma rota protegida **SEM TOKEN** informado

* Envio uma requisição para alguma rota protegida **COM TOKEN INVÁLIDO** informado.

* Envio uma requisição para alguma rota protegida **COM TOKEN EXPIRADO** informado.

* Envio uma requisição para alguma rota protegida **COM ERRO DESCONHECIDO** retornado pela Middleware (para isso, uma excepion proposital pode ser lançada na Middleware **AuthJwt** para visualizar o erro).

Para mapeamento de novas exceptions, basta criar uma nova classe que implemente a interface **IExceptionResponse** e inserir na constante **EXCEPTIONS** do serviço **AuthExceptionService**, contendo qual a exception a ser *MAPEADA* e qual a classe *RESPONSÁVEL* pelo retorno.
## Rodando os testes

Na **raiz do projeto**, execute o comando:

```bash
docker-compose exec php7_base vendor/bin/phpunit
```

## Documentação

* [Artigo com a explicação do passo a passo do desenvolvimento (Em breve)](https://medium.com/@wenlopes)

* [tymon/jwt-auth](https://jwt-auth.readthedocs.io/en/develop/laravel-installation/)

* [Laravel 8](https://laravel.com/docs/8.x/releases)

* [Docker](https://www.docker.com/)