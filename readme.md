# Teste Receiv

## __Instalação__
### __Requisitos__

#### Se for utilizar o Browser-Sync e Gulp (Teste de Responsividade):
> 1. Possuir o Node.js instalado. [Link](https://nodejs.org/pt-br/) para instalação
> 2. MySql versão >= 5.6
> 3. npm intall
```bash
$ gulp connect-sync
```


#### Caso não utilize o Browser-Sync:
> 1. MySql versão >= 5.6
> 2. Servidor Apache
> 3. PHP>=7.1
> 4. PDO

### __Banco de dados__

> O script de criação do banco se encontra na pasta [___docs/___](docs/)
> 
> Execute primeiro o script.sql
> Depois execute o populate.sql para povoamento e testes

### __Configuração__
1. #### Arquivo init.php
    * Arquivo localizado na pasta [raiz](./)
    * Configurar arquivo de acordo com seu Danco de Dados


```php
define('DB_HOST', '');
define('DB_NAME', 'testerevict');
define('DB_USER', '');
define('DB_PASS', '');
define('DB_PORT', '');
```


