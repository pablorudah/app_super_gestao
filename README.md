### Work In Progress (...)

## O que é este repositório

Este repositório foi criado durante meus estudos no Curso de Desenvolvimento Web Avançado com PHP, Laravel e Vue.JS
do professor Jorge Sant Ana, comprado na plataforma Udemy pelo link https://www.udemy.com/course/curso-completo-do-desenvolvedor-laravel/

Este projeto foi desenvolvido durante as Seções 1 a 12 do Curso, uma aplicação preparada para que o aluno aprenda os 
conhecimentos iniciais sobre o Framework Laravel. Importante destacar que o professor utiliza uma versão "antiga" do 
framework no Curso, a versão 7. De época que o Curso foi criado para cá muita coisa já mudou, mas acredito que a 
metodologia do professor é muito boa para que o aluno entenda o básico e o intermediário durante o dia a dia manipulando
o Laravel.

Dentro do desenvolvimento da aplicação foram explorados conceitos iniciais bastante importantes como:
- Introdução a Rotas, Views e Controllers
- Como funciona as Models, Migrations, Seeders e Factories
- Como funciona o Eloquent ORM e o Tinker
- Introdução e entendimento de Formulários
- Middlewares
- Introdução a Autenticação de usuários
- Paginação de Registros e Controladores com Resources
- Lazy Loading e Eager Loading
- Relacionamentos (1 para 1, 1 para N, N para N)

# Meu objetivo

Ao final do Curso, pretendo refatorar este projeto (provavelmente uma V2) criando uma interface mais agradável e com recursos visuais melhorados, utilizando o conceito da TALL stack (Tailwind CSS, AlpineJS, Laravel e Livewire), e divulga-lo no meu 
portfólio. Por enquanto ele está sendo utilizado apenas para fins de estudo e conhecimento.

# Como rodar o projeto e o que ele é

Este repositório contém uma interface de funcionamento simples, porém que não funciona sem um banco de dados no seu ambiente local. No meu caso eu utilizei o mysql. O projeto pode ser rodado na sua máquina local, desde que você siga a seguinte sequência de passos a seguir:

- Primeiro: clone o repositório do projeto na sua máquina com o git
- Segundo: acesse a pasta do projeto e execute via terminal o comando php artisan migrate (as migrations
foram criadas para que o seu banco de dados local seja gerado com as tabelas correspondentes no uso da aplicação) - NOTA: para que o comando funcione corretamente, é necessário configurar o serviço do mysql na sua máquina e em seguida que você configure 
o arquivo .env ao clonar o projeto.
- Terceiro: rode o comando php artisan serve para servir a aplicação no seu navegador
- Quarto: instale o composer via terminal 
- Por último abra no link gerado pelo seu terminal a aplicação e verifique o funcionamento via interface (
consultar as rotas disponíveis no arquivo web.php)

# Contato

Caso queira entrar em contato comigo para dúvidas e esclarecimentos, ou para trocar uma ideia mesmo
para entender se esse Curso pode te ajudar, meu email é pablorudah@gmail.com




