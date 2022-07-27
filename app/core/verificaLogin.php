<?php

// se não existe uma sessão chamada 'usuario' será redirecionada para a pagina de login
if (!$_SESSION['usuario']) {
  header("Location: ../index.php");
  exit();
}
