<?php

require_once '../../lib/matheus/Database/config.php';

if (!empty($_POST)) {
  if (!empty($_POST['nome'])) {
    if (!empty($_POST['sobrenome'])) {
      if (!empty($_POST['datanasc'])) {
        if (!empty($_POST['email']) && !empty($_POST['confEmail'])) {
          if ($_POST['email'] == $_POST['confEmail']) {
            if (!empty($_POST['confSenha']) && !empty($_POST['senha'])) {
              if ($_POST['senha'] == $_POST['confSenha']) {
                if (!empty($_POST['insertImg'])) {
                  try {
                    $sql = "INSERT INTO usuarios
                                (nome, sobrenome,data_nascimento,email, senha, foto_perfil)
                              VALUES
                                (:nome, :sobrenome, :datanasc,:email, :senha, :insertImg)";
                    $stmt = $pdo->prepare($sql);

                    $dados = array(
                      ':nome' => $_POST['nome'],
                      ':sobrenome' => $_POST['sobrenome'],
                      ':datanasc' => $_POST['datanasc'],
                      ':email' => $_POST['email'],
                      ':senha' => md5($_POST['senha']),
                      ':insertImg' => ($_FILES['insertImg'])
                    );
                    if ($stmt->execute($dados)) {
                      header("Location: ../../index.php?msgSucesso=Cadastro realizado com sucesso");
                    } else {
                      header("Location: ../indexCad.php?msgErro=Erro de Acesso");
                    }
                  } catch (PDOException $e) {
                    header("Location: ../indexCad.php?msgErro=Email já Existente !");
                  }
                } else {
                  header("Location: ../indexCad.php?msgErro=Insira uma Foto de Perfil");
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
