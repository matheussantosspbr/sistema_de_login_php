<?php

require_once '../../lib/matheus/Database/config.php';

if (!empty($_POST)) {
  // Verificação se tem campos vazios
  if (!empty($_POST['nome'])) {
    if (!empty($_POST['sobrenome'])) {
      if (!empty($_POST['datanasc'])) {
        if (!empty($_POST['email']) && !empty($_POST['confEmail'])) {
          // verificação se os campos email e confirmação de email é iguais
          if ($_POST['email'] == $_POST['confEmail']) {
            if (!empty($_POST['confSenha']) && !empty($_POST['senha'])) {
              // verificação se os campos senha e confirmação de senha é iguais
              if ($_POST['senha'] == $_POST['confSenha']) {
                // se estiver tudo certo, fazer o processo de cadastro
                try {

                  //query de inserção de dados 
                  $sql = "INSERT INTO usuarios
                                (nome, sobrenome, data_nascimento,email, senha)
                              VALUES
                              (?,?,?,?,?)";

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
              } else {
                header("Location: ../indexCad.php?msgErro=As senhas não se coincidem");
              }
            } else {
              header("Location: ../indexCad.php?msgErro=Os Campos de Senhas não pode estar vazias !");
            }
          } else {
            header("Location: ../indexCad.php?msgErro=Os emails não se coincidem");
          }
        } else {
          header("Location: ../indexCad.php?msgErro=Os Campos de Emails não pode estar vazios !");
        }
      } else {
        header("Location: ../indexCad.php?msgErro=Coloque sua data de nascimento !");
      }
    } else {
      header("Location: ../indexCad.php?msgErro=O Campo sobrenome não pode estar vazio !");
    }
  } else {
    header("Location: ../indexCad.php?msgErro=O Campo nome não pode estar vazio !");
  }
} else {
  header("Location: ../indexCad.php?msgErro=Erro");
}
