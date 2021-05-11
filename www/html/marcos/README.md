# Treinamento PHP 8 com CodeIgniter 4

## Projeto

Durante o treinamento foi desenvolvido uma agenda, onde foi possível estudar as características e recursos básicos do PHP 8 e CodeIgniter 4 e algumas etapas de desenvolvimento, como:

* Utilização do Composer
    * Criação do Projeto
    * Instalação do Twig
* Estrutura dos diretórios
* Funcionamento do MVC
* Recursos do Spark
    * spark make
    * spark migration
    * spark seed
* Migrations
    * TiposContato
    * Contato
* Seeds
    * TipoContatoSeeder
* Models
    * TipoContatoModel
    * ContatoModel
* Controller
    * Home
* Criação das Views
    * Utilização de Código PHP na view
    * Utilização do Paser View do CI4
    * Utilização do Template Engine Twig.
* Publicação das etapas no Git.

---
## Docker

Também foi abordado a utilização do Docker como ambiente de desenvolvimento, onde foi demonstrado a utilização da extensão do Docker para o VSCode e as configurações básicas do arquivo `docker-compose` e `Dockerfile`, para gerar um ambiente LAMP com PHP 8, MySQL 8 e phpMyAdmin.

---
## Composer

Após clonar esse repositório, antes de executar é necessário instalar todas as dependências utilizando o Composer, para isso basta acessar o diretório do projeto e utilizando o terminal executar o comando:

    composer install

Obs. Se estiver utilizando o Docker é necessário acessar o terminal da imagem PHP, conforme print. 

![terminal docker](https://raw.githubusercontent.com/marcos-queiroz/agenda/master//screenshot/terminal-docker.png)

## Configurar o CodeIgniter

Faça uma cópia do arquivo `env` e o nomeie com `.env`, se necessário altere os parâmetros "baseUrl" e "database.default". 

Exemplo:

    app.baseURL = 'http://localhost/agenda/public'

ou se estiver usando vhost

    app.baseURL = 'http://agenda.localhost/'

Para utilizar as configurações do banco de dados do arquivo `docker-compose` segue o exemplo:

    database.default.hostname = host.docker.internal
    database.default.database = agenda
    database.default.username = root
    database.default.password = bee
    database.default.DBDriver = MySQLi

---
## Executar as Migrations

É necessário executar as migrations para criação das tabelas do nosso banco de dados. 

No gerenciador do MySQL (phpMyAdmin caso esteja utilizando o `docker-compose` de exemplo) crie um novo banco de dados com o nome `agenda`.

![phpMyAdmin](https://raw.githubusercontent.com/marcos-queiroz/agenda/master//screenshot/phpmyadmin.png)

Com o banco de dados criado, execute o comando:

    php spark migrate:status

Tudo ocorrendo bem esse comando exibirá todas as migrations e seus status, conforme print.

![Status da Migration](https://raw.githubusercontent.com/marcos-queiroz/agenda/master//screenshot/terminal-migrate-status.png)

Para executar a migration basta usar o comando:

    php spark migrate

Será exibido uma saída semelhante ao print, e rodando o comando anterior também é possível verificar que o status agora exibe o Grupo, Lote e Quando a migração ocorreu.

![Execução da Migration](https://raw.githubusercontent.com/marcos-queiroz/agenda/master//screenshot/terminal-migrate-run.png)

Após a execução das Migrations, podemos verificar como ficou nosso banco de dados no phpMyAdmin.

![Tabelas no Banco](https://raw.githubusercontent.com/marcos-queiroz/agenda/master//screenshot/phpmyadmin-tabelas.png)

![Tabelas no Banco](https://raw.githubusercontent.com/marcos-queiroz/agenda/master//screenshot/phpmyadmin-banco.png)


---

## Seeds

Após criar as tabelas usamos o seed para popula/semear com os tipos de contato que nossa agenda utiliza como padrão.

Para isso basta executar o comando:

    php spark db:seed TipoContatoSeeder

Se nenhum erro ocorrer a tabela `tipos_contato` será populada com 2 registros. 

---
## Acessar o Projeto

Ao acessar o endereço `http://localhost/agenda/public` será exibido a view de boas vindas.

![name-of-you-image](https://raw.githubusercontent.com/marcos-queiroz/agenda/master/screenshot/home_page.png)

Nessa aplicação é possível cadastrar um novo contato, editar ou excluir. Como foi definido no Model ao clicar em excluir o registro não será excluído `fisicamente` do banco, mas receberá uma marcação indicando que o mesmo foi excluído, dando assim a possibilidade de recuperar o registro.
