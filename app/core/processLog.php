<?php
session_start();
require_once '../../lib/matheus/Database/config.php';


if (!empty($_POST)) {
  if (!empty($_POST['email'])) {
    if (!empty($_POST['senha'])) {
      try {
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
          $_SESSION['usuario'] = $email;
          $_SESSION['senha'] = $senha;
          header("Location: ../painel.php");
          exit();
        } else {
          header("Location: ../../index.php?msgErro=Email ou Senha invalida !");
          exit();
        }
      } catch (PDOException $e) {
        header("Location: ../../index.php?msgErro=Erro !");
      }
    } else {
      header("Location: ../../index.php?msgErro=Digite sua Senha !");
      exit();
    }
  } else {
    header("Location: ../../index.php?msgErro=Digite Seu Email !");
    exit();
  }
}

exit();
