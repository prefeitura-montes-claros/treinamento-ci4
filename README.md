# Treinamento: PHP7 com CodeIgniter 4 - CI4

O CodeIgniter ou CI é um Framework PHP, simples mas poderoso, pois segue as melhores recomendações da PSR e metodologias de desenvolvimento.

Sua curva de aprendizado é considerada curta, com conhecimentos básicos de PHP e Orientação a Objetos, os desenvolvedores são capazes de desenvolver deste aplicações simples até grandes projetos. 

Para mais detalhes basta consultar sua documentação, que é bem simples de compreender e com exemplos de uso de seus recursos em: http://codeigniter.com/user_guide/index.html

## Requisitos para acompanhar o Treinamento

Alguns requisitos são importantes para esse treinamento, nem todos são obrigatórios.

### POO

Noções de Programação Orientada a Objetos, um bom artigo para começar: https://www.alura.com.br/artigos/poo-programacao-orientada-a-objetos

### PHP

Noções da Linguagem PHP, documentação oficial da linguagem: https://www.php.net/manual/pt_BR/

### Git

Noções de versionamento com Git, mais detalhes em: https://git-scm.com/book/pt-br/v2

### Composer

Noções de utilização de gerenciamento de dependências, como estamos desenvolvendo um projeto com PHP, vamos utilizar o Composer.

O Composer é um gerenciador de dependências para PHP, com ele é mais pratico manter todas as dependências do projeto sempre atualizadas, evitando a configuração e atualização manual de bibliotecas que o seu projeto utiliza para mais informações sobre: https://getcomposer.org/

### Docker

Noções de utilização de containers para ambientes de desenvolvimento, para mais detalhes visite: https://www.docker.com/

Obs.: O Docker não é obrigatório para esse treinamento, já que o mesmo pode acompanhado utilizando algum pacote como Xampp, LAMP etc.

---
### Bem vindo ao CodeIgniter 4

Conhecendo um pouco da documentação do CI4, http://codeigniter.com/user_guide/intro/index.html nesse link, a documentação faz uma pequena introdução ao CI4 e algumas possibilidades de uso.

### Requisitos

http://codeigniter.com/user_guide/intro/requirements.html nesse link, temos alguns requisitos necessários para "rodar" o projeto.

---
## Instalação

http://codeigniter.com/user_guide/installation/index.html nesse link, a documentação explica as várias formas de instalar o CI4 em seu ambiente de desenvolvimento.

### Manual 

A maneira mais simples é a instalação manual, onde basta acessar a página oficial, ou o repositório do Git do projeto e baixar uma copia dos códigos que compõem o Framework. Mais detalhes no link http://codeigniter.com/user_guide/installation/installing_manual.html

### Composer

É possível utilizar o Composer para iniciar um novo projeto usando o CI4, como demonstrado no link: http://codeigniter.com/user_guide/installation/installing_composer.html

Para isso basta digitar no terminal o comando:

    composer create-project codeigniter4/appstarter project-root

'project-root' é o nome do diretório do projeto, que pode ser substituído por qualquer nome a sua escolha. Se não for informado o composer ira criar o diretório com o nome 'appstarter'.


#### Tradução

Utilizando o Composer também é possível instalar o pacote de traduções do CI4, isso é muito util pois podemos traduzir algumas mensagens que o sistema utilizar para dar feedback aos usuários. 

Para isso, basta entrar na pasta do projeto e executar o comando. 

    composer require codeigniter4/translations

---


# Treinamento

O treinamento será dividido em algumas partes, para melhor absorção do conteúdo. 

* Preparação do Ambiente:
    * Instalação do Git;
    * Instalação do Composer;
    * Instalação do VSCode;
    * Configuração do Docker;
* Git
    * Realizar um Fork desse repositório;
    * Clonar o repositório;
    * Criar o Projeto;
    * Realizar o 1º Commit;
    * Realizar o 1º Push;
* Conhecer a estrutura do CI4;
    * Navegando pelos diretórios;
    * Alterando a View 'welcome_message';
    * Alterando o Controller 'Home';
* Entendendo o funcionamento das Rotas
    * Estudando a documentação;
    * Criando rotas;
* Entendendo o MVC
    * O que é MVC;
    * Model;
    * View;
    * Controller;
* Entendendo as Migrations
    * Objetivo;
    * Como criar;
    * Commit das Migrations;
* Model
    * Criando as Models;
    * Entendendo seus recursos;
* Controller
    * Criando os Controllers;
    * Entendendo seus recursos;
* Views
    * Criando as Views;
    * Criando o primeiro CRUD;


# Recursos

Nesse repositório está disponível o Docer Composer contendo uma imagem preparada para a utilização do PHP 7 com MySQL e o PHP MyAdmin para geranciamento do banco de dados. 
