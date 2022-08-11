<?php

require_once '../../lib/matheus/Database/config.php';

$campos = ['nome', 'sobrenome', 'datanasc', 'email', 'confEmail', 'senha', 'confSenha'];
$msgs = ['Nome', 'Sobrenome', 'Data de Nascimento', 'Email', 'Confirme seu Email', 'Senha', 'Confirme Sua Senha'];

//query de inserção de dados 
$sql = "INSERT INTO usuarios
          (nome, sobrenome, data_nascimento,email, senha)
        VALUES
          (?,?,?,?,?)";

if (!empty($_POST)) {
  // Verificação se tem campos vazios
  for ($i = 0; $i <= 6; $i++) {
    if (empty($_POST[$campos[$i]])) {
      header("Location: ../indexCad.php?msgErro=O Campo $msgs[$i] não pode estar vazio !");
      exit();
    }
  }
  //Verificação se os Emails e Senhas são iguais
  if (!($_POST['email'] == $_POST['confEmail'])) {
    header("Location: ../indexCad.php?msgErro=Os emails não se coincidem");
    exit();
  } else if (!($_POST['senha'] == $_POST['confSenha'])) {
    header("Location: ../indexCad.php?msgErro=As senhas não se coincidem");
    exit();
  }
  //Porcesso de cadastro
  try {
    $stmt = $pdo->prepare($sql);
    // substituir os ? pelos valores dos inputs
    $stmt->bindValue(1, $_POST['nome']);
    $stmt->bindValue(2, $_POST['sobrenome']);
    $stmt->bindValue(3, $_POST['datanasc']);
    $stmt->bindValue(4, $_POST['email']);
    $stmt->bindValue(5, md5($_POST['senha']));
    // execultar cadastro
    if ($stmt->execute()) {
      header("Location: ../../index.php?msgSucesso=Cadastro realizado com sucesso");
    }
    // Para caso ouver algum erro durante o processo de cadastro
  } catch (PDOException $e) {
    header("Location: ../indexCad.php?msgErro=O Email já existe !");
  }
}
