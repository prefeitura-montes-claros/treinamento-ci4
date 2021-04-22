# Git

## Criar um novo repositório Git

Para iniciar um novo repositório em seu ambiente, navegue até um diretório, no terminal digite o comando para criar um novo arquivo README.md

    echo "# Nome do Projeto" >> README.md 

Após criar o arquivo, inicie o repositório com o comando:

    git init 

Uma vez iniciado o repositório, toda vez que finalizar os trabalhos ou alterações de uma tarefa, adicione o que foi modificado utilizando o comando:

    git add README.md 

Ou se desejar adicionar todos os arquivos modificados, basta digitar:

    git add .

Depois de adicionar as alterações, faça uma pequena descrição do que se trata com o comando:

    git commit -m "first commit" 

Crie uma branch ou ramificação para onde deseja apontar as alterações

    git branch -M main 

Adicione a origem ou o repositório do git, para onde deseja enviar as alterações

    git remote add origin https://github.com/nome-usuario/repositorio.git

Para finalizar, agora só empurar as alterações para o repositório do Git:

    git push -u origin main