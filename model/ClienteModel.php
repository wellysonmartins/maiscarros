<?php

  
  class Cliente extends CRUD {

  
    public function insert() {
      $pdo = parent::connect();

      $nomeCliente = $_POST['nomeCliente'];
      $dataNascimento = $_POST['dataNascimento'];
      $cpf = $_POST['cpf'];
      $telefone = $_POST['telefone'];
      $email = $_POST['email'];
      
      $validar = $pdo->prepare("SELECT * FROM cliente WHERE cpf=:cpf");
      $validar->bindValue(':cpf', $cpf);
      $validar->execute();

      if( $validar->rowCount() == 0 ):
     
        $sqlCliente = $pdo->prepare("INSERT INTO cliente(nomeCliente, dataNascimento, cpf, telefone, email)VALUES(:nomeCliente, :dataNascimento, :cpf, :telefone, :email)");

        $sqlCliente->bindValue(':nomeCliente', $nomeCliente);
        $sqlCliente->bindValue(':dataNascimento', $dataNascimento);
        $sqlCliente->bindValue(':cpf',     $cpf);
        $sqlCliente->bindValue(':telefone',    $telefone);
        $sqlCliente->bindValue(':email',     $email);
        $sqlCliente->execute();

        //$message = 'Cadastro realizado com sucesso!';
        header("Location: ../../view/func_clientes.php");
      else:
        $message = 'Já existe um cliente com este email!';
        header("Location: ../../view/func_form_cadastro.php?message={$message}");
      endif;
    }

   

    public function update() {
      $pdo = parent::connect();

      $id = $_POST['id'];
      $nomeCliente = $_POST['nomeCliente'];
      $dataNascimento = $_POST['dataNascimento'];
      $cpf = $_POST['cpf'];
      $telefone = $_POST['telefone'];
      $email = $_POST['email'];
      
      if( !empty( $nomeCliente ) ) {
        $sql = $pdo->prepare("UPDATE cliente SET nomeCliente=:nomeCliente WHERE id=:id");
        $sql->bindValue(':nomeCliente', $nomeCliente);
        $sql->bindValue(':id', $id);
        $sql->execute();
      }

      if( !empty( $dataNascimento ) ) {
        $sql = $pdo->prepare("UPDATE cliente SET dataNascimento=:dataNascimento WHERE id=:id");
        $sql->bindValue(':dataNascimento', $dataNascimento);
        $sql->bindValue(':id', $id);
        $sql->execute();
      }

      if( !empty( $cpf ) ) {
        $sql = $pdo->prepare("UPDATE cliente SET cpf=:cpf WHERE id=:id");
        $sql->bindValue(':cpf', $cpf);
        $sql->bindValue(':id', $id);
        $sql->execute();
      }

      if( !empty( $telefone ) ) {
        $sql = $pdo->prepare("UPDATE cliente SET telefone=:telefone WHERE id=:id");
        $sql->bindValue(':telefone', $telefone);
        $sql->bindValue(':id', $id);
        $sql->execute();
      }

      if( !empty( $email ) ) {
        $sql = $pdo->prepare("UPDATE cliente SET email=:email WHERE id=:id");
        $sql->bindValue(':email', $email);
        $sql->bindValue(':id', $id);
        $sql->execute();
      }
      
      $message = 'Usuário atualizado com sucesso!';
      header("Location: ../../view/func_clientes.php?message={$message}");
    }

    

    public function getLoggedUser() {

      if( !empty($_SESSION['email']) || !empty($_SESSION['senha']) ):
        $pdo = parent::connect();

        $id = $_SESSION['id'];

        $sql = $pdo->prepare("SELECT * FROM cliente WHERE id=:id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        $currentUser = $sql->fetchAll(PDO::FETCH_ASSOC);

        if( !empty( $currentUser ) ) {
          return $currentUser;
        } else {
          $Funcionario = new Funcionario;
          return $Funcionario->getLoggedUser();
        }

      endif;
    }

    public function loggedUserName() {
      $user = $this->getLoggedUser();
      return $user[0]['nomeCliente'];
    }

    public function getName() {
      $user = $this->getLoggedUser();
      return $user[0]['nomeCliente'];
    }
  }

?>