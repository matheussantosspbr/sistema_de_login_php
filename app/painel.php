<?php
session_start();
// Verificação de Login
include('core/verificaLogin.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/styleCad.css">
  <title>Painel</title>
</head>

<body style="
  height:100vh;
  display: flex;
  align-items: center;
  justify-content: space-around;
  ">
  <h2 style="color: white;">Olá, <?php echo $_SESSION['usuario']; ?></h2>
  <h2><a href="core/logout.php">Sair</a></h2>
</body>

</html>
