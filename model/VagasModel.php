<?php

  class Vagas extends CRUD {

    public function insert() {
      $pdo = parent::connect();

      $vaga =      $_POST['id'];

      $validar = $pdo->prepare("SELECT * FROM vagas WHERE id=:id");
      $validar->bindValue(':id', $vaga);
      $validar->execute();

      if( $validar->rowCount() == 0 ):
        $sql = $pdo->prepare("INSERT INTO vagas(id)VALUES(:id)");

        $sql->bindValue(':id',      $vaga);
        
        $sql->execute();
        $message = 'Cadastro realizado com sucesso!';
        header("Location: ../../view/home_admin.php");
      else:
        $message = 'Já existe um funcionario com este Nome!';
        header("Location: ../../view/home_admin.php?message={$message}");
      endif;
    }

    public function insertSaida() {
      $pdo = parent::connect();

      $id_entrada_veiculo = $_POST['id'];

      $sql = $pdo->prepare("INSERT INTO saida_veiculo(id_entrada_veiculo, data_saida, hora_saida)VALUES(:id_entrada_veiculo, :data_saida, :hora_saida)");

      $sql->bindValue(':id_entrada_veiculo', $id_entrada_veiculo);
      $sql->bindValue(':data_saida', $data_saida);
      $sql->bindValue(':hora_saida', $hora_saida);
        
      $sql->execute();
      $message = 'Cadastro realizado com sucesso!';
      header("Location: ../../view/home_admin.php");
      
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

    public function auth() {
      parent::sessionStart();
      $user = parent::userType('usuario');

      if( $user < 1 ) {
        header("Location: ../index.php");
      }
    } 

  }

?>