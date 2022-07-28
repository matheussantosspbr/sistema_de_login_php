# sistema_de_login_php
<br>

👩🏻‍💻 Fiz um projeto Simples usando  HTML, CSS, PHP e o banco de dados PostegreSQL.

Nesse Projeto para você logar você tem que ter um cadastro, sendo assim você faz o seu cadastro ( o email não precisa existir ),
com NOME, SOBRENOME, DATA DE NASCIMENTO ( não precisa ser verdadeira ), EMAIL e SENHA.
 
 Será feito a validação para ver se está tudo ok, se estiver algo errado, será retornado um erro na tela,
 caso estiver tudo Ok, você será redirecionado para a pagina de login, para você logar.
 
 Se você tentar cadastrar um email que já existe, não será permitido, porque na query, o email é a chave primária, sendo assim, não poderá ter 2 emails iguais !
 
 Após logar,você será redirecionado para a aba painel e irá mostrar o email que vc cadastrou na tela.
 
 Se você não fazer o logout, fechar a janela e tentar acessar o painel sem logar, vai permitir você entrar, pois você não efetuou o logout.
 
 Caso você fez o logout, e tentar acessar a aba painel atravéz da url, não será permitido, e será redirecionado para a aba login !
