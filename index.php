<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/styleLog.css">
  <title>Login</title>
</head>

<body>
  
  <!-- Contreinner de Alertas -->
  <div class="rescontreinner">
    <!-- Caso apareça uma mensagem de erro via GET  -->
    <?php if (!empty($_GET['msgErro'])) { ?>
      <div class="alertErro">
        <?php echo $_GET['msgErro'] ?>
      </div>
    <?php } ?>
    <!-- Caso apareça uma mensagem de Sucesso via GET  -->
    <?php if (!empty($_GET['msgSucesso'])) { ?>
      <div class="alertSucess">
        <?php echo $_GET['msgSucesso'] ?>
      </div>
    <?php } ?>
  </div>
  <h1>Faça seu Login</h1>
  <form action="app/core/processLog.php" method="post">
    <div class="contreinner">
      <label for="Email">Email</label>
      <input type="email" name="email" class="but" require>

      <label for="Senha">Senha</label>
      <input type="password" name="senha" class="but" minlength="8" require>
    </div>
    <div class="contreinnerBut">
      <a href="app/indexCad.php">Cadastre-se</a>
      <input type="submit" value="Logar" name="submit">
    </div>
  </form>
</body>

</html>
