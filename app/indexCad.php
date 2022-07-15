<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/styleCad.css">
  <title>Login</title>
</head>

<body>
  <div class="rescontreinner">
    <?php if (!empty($_GET['msgErro'])) { ?>
      <div class="alertErro">
        <?php echo $_GET['msgErro'] ?>
      </div>
    <?php } ?>
    <?php if (!empty($_GET['msgSucesso'])) { ?>
      <div class="alertSucess">
        <?php echo $_GET['msgSucesso'] ?>
      </div>
    <?php } ?>
  </div>
  <h1>Faça seu Cadastro</h1>
  <form action="core/processCad.php" method="post">
    <div class="contreinner">
      <label for="Nome">Nome</label>
      <input type="text" name="nome" class="but" require>
      <label for="sobrenome">Sobrenome</label>
      <input type="text" name="sobrenome" class="but" require>
      <label for="Nome">Data de Nascemento</label>
      <input type="date" name="datanasc" class="but" require>
      <label for="Email">Email</label>
      <input type="email" name="email" class="but" require>
      <label for="Email">Confirme o Email</label>
      <input type="email" name="confEmail" class="but" require>
      <label for="Senha">Senha</label>
      <input type="password" name="senha" class="but" minlength="8" require>
      <label for="Senha">Confirme a senha</label>
      <input type="password" name="confSenha" class="but" minlength="8" require>
    </div>
    <div class="contreinnerBut">
      <a href="index.php">Cancelar</a>
      <input type="submit" value="Cadastrar" name="submit">
    </div>
  </form>

</body>

</html>
