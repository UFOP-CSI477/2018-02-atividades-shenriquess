# 2018-02-atividades-shenriquess

## Atividades práticas 2 e 3

### Curso: Sistemas de Informação
### Aluno: Saulo Henrique Silva e Souza
### Matrícula: 15.1.8101
### E-mail: saulo.souza@aluno.ufop.edu.br

#### Atividades baseadas no curso grátis **LARAVEL: CRIANDO UM CARRINHO DE COMPRAS EM PHP.** Disponível [aqui](https://www.devmedia.com.br/curso/laravel-criando-um-carrinho-de-compras-em-php/1958)

#### Orientações Básicas

##### Foram criados dois usuários padrão para o sistema:

* **Nome:** Administrador **E-mail:** admin@admin.com **Password:** 123456

* **Nome:** Operador **E-mail:** operador@admin.com **Password:** 123456

Para inserí-los no banco de dados basta acessar pasta a raiz do projeto através de um terminal e digitar o comando: *php artisan db:seed*

##### Para que o upload e o carregamento de imagens ocorra corretamente:

* É necessário rodar o comando *php artisan storage:link* que faz uma ligação simbólica com a pasta *storage*, pois só é possível exibir itens na view que estejam em /public.

* Caso os links das imagens não funcionem, talvez seja necessário acessar a pasta *ProjetoPetshop\public* e apagar a(s) pasta(s) de atalho caso existam.
