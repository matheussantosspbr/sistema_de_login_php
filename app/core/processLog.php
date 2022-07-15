<?php

require_once '../../lib/matheus/Database/config.php';


if (!empty($_POST)) {
  if (!empty($_POST['email'])) {
    if (!empty($_POST['senha'])) {
      $email = $_POST['email'];
      $senha = md5($_POST['senha']);

      $stmt = $pdo->prepare(
        "SELECT * FROM usuarios WHERE email = ? AND senha = ?"
      );

      $stmt->bindParam(1, $email);
      $stmt->bindParam(2, $senha);

      $stmt->execute();
      $users = $stmt->fetchAll();


      if (!($users == array())) {
        header("Location: ../../index.php?msgSucesso=Logado com sucesso");
      } else {
        header("Location: ../../index.php?msgErro=Email ou Senha invalida !");
      }
    } else {
      header("Location: ../../index.php?msgErro=Digite sua Senha !");
    }
  } else {
    header("Location: ../../index.php?msgErro=Digite Seu Email !");
  }
}
