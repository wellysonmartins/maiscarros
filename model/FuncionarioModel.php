<?php

  class Funcionario extends CRUD {

    public function insert() {
      $pdo = parent::connect();

      $nome =      $_POST['nome'];
      $login =     $_POST['login'];
      $senha =     md5($_POST['senha']);

      $validar = $pdo->prepare("SELECT * FROM usuario WHERE login=:login");
      $validar->bindValue(':login', $login);
      $validar->execute();

      if( $validar->rowCount() == 0 ):
        $sql = $pdo->prepare("INSERT INTO usuario(nome, login, senha)VALUES(:nome, :login, :senha)");

        $sql->bindValue(':nome',      $nome);
        $sql->bindValue(':login',     $login);
        $sql->bindValue(':senha',     $senha);

        $sql->execute();
        $message = 'Cadastro realizado com sucesso!';
        header("Location: ../../view/admin_funcionarios.php");
      else:
        $message = 'Já existe um funcionario com este nome!';
        header("Location: ../../view/admin_form_cadastro.php?message={$message}");
      endif;
    }

    public function update() {
      $pdo = parent::connect();

      $id =        $_POST['id'];
      $nome =      $_POST['nome'];
      $login =     $_POST['login'];
      $senha =     md5($_POST['senha']);

      if( !empty( $nome ) ) {
        $sql = $pdo->prepare("UPDATE usuario SET nome=:nome WHERE id=:id");
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':id', $id);
        $sql->execute();
      }

      if( !empty( $login ) ) {
        $sql = $pdo->prepare("UPDATE usuario SET login=:login WHERE id=:id");
        $sql->bindValue(':login', $login);
        $sql->bindValue(':id', $id);
        $sql->execute();
      }

      if( !empty( $_POST['senha'] ) ) {
        $sql = $pdo->prepare("UPDATE usuario SET senha=:senha WHERE id=:id");
        $sql->bindValue(':senha', $senha);
        $sql->bindValue(':id', $id);
        $sql->execute();
      }

      $message = 'Usuário atualizado com sucesso!';
      header("Location: ../../view/admin_funcionarios.php?message={$message}");
    }

    public function getLoggedUser() {
      $pdo = parent::connect();
      
      $login = $_SESSION['login'];
      $senha = $_SESSION['senha'];

      $sql = $pdo->prepare("SELECT * FROM usuario WHERE login=:login and senha=:senha");
      $sql->bindValue(':login', $login);
      $sql->bindValue(':senha', $senha);
      $sql->execute();

      $currentUser = $sql->fetchAll(PDO::FETCH_ASSOC);
      return $currentUser;
    }

    public function getName() {
      $user = $this->getLoggedUser();
      return $user[0]['nome'];
    }
      
    public function getLogin() {
      $user = $this->getLoggedUser();
      return $user[0]['login'];
    }

    public function auth() {
      parent::sessionStart();
      $user = parent::userType('usuario');

      if( $user < 1 ) {
        header("Location: ../index.php");
      } 
    } 

  }

?>