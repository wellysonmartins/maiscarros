<?php

  
  class Entrada extends CRUD {

  
    public function insert() {
      $pdo = parent::connect();

      date_default_timezone_set('America/Bahia');

      $placa = $_POST['placa'];
      $modelo = $_POST['modelo'];
      $cor = $_POST['cor'];
      $data_hora_entrada = date('Y-m-d H:i:s');
      $id_cliente = $_POST['id_cliente'];
      $id_vaga = $_POST['id_vaga'];

      $sqlID = $pdo->prepare("SELECT count(id) FROM entrada_veiculo");
      $sqlID->execute();
      $result = $sqlID->fetchColumn();

      if ($result > 0) {
        $sqlID2 = "SELECT MAX(id) as id FROM entrada_veiculo";
        $sqlID2 = $pdo->query($sqlID2);
        $row = $sqlID2->fetch();
        $ultimoID = $row['id'] + 1;
      } else {
        $sqlID2 = "SELECT MAX(id) as id FROM servicos";
        $sqlID2 = $pdo->query($sqlID2);
        $row = $sqlID2->fetch();
        $ultimoID = $row['id'] + 1;  
      }      
      
        $sqlCliente = $pdo->prepare("INSERT INTO entrada_veiculo(id, placa, modelo, cor, data_hora_entrada, id_cliente, id_vaga)VALUES(:ultimoID, :placa, :modelo, :cor, :data_hora_entrada, :id_cliente, :id_vaga)");
        $sqlCliente->bindValue(':ultimoID', $ultimoID);
        $sqlCliente->bindValue(':placa', $placa);
        $sqlCliente->bindValue(':modelo', $modelo);
        $sqlCliente->bindValue(':cor',     $cor);
        $sqlCliente->bindValue(':data_hora_entrada', $data_hora_entrada);
        $sqlCliente->bindValue(':id_cliente', $id_cliente);
        $sqlCliente->bindValue(':id_vaga', $id_vaga);
        $sqlCliente->execute();
        
        $sqlVaga = $pdo->prepare("UPDATE vagas SET ocupada=1 WHERE id = :id_vaga");
        $sqlVaga->bindValue(':id_vaga', $id_vaga);
        $sqlVaga->execute();

        $message = 'Cadastro realizado com sucesso!';
        
        $sql5 = $pdo->prepare("SELECT * FROM entrada_veiculo WHERE id_vaga=:id_vaga");
        $sql5->bindValue(':id_vaga', $id_vaga);
        $sql5->execute();
        $servicos = $sql5->fetchAll(PDO::FETCH_ASSOC);
        foreach ($servicos as $servico) {
            $id = $servico['id'];
        }
        
        header("Location: ../../view/home_func_pdf_entrada.php?id={$id}");
      
    }

    public function insertSaida() {
      $pdo = parent::connect();
      date_default_timezone_set('America/Bahia');

      $id_entrada_veiculo = $_POST['id'];
      $data_hora_saida = date('Y/m/d H:i:s');
      $data_registro = date('Y/m/d');

      $sql1 = $pdo->prepare("SELECT * FROM entrada_veiculo WHERE id=:id_entrada_veiculo");
      $sql1->bindValue(':id_entrada_veiculo', $id_entrada_veiculo);
      $sql1->execute();
      $entradas = $sql1->fetchAll(PDO::FETCH_ASSOC);
      foreach ($entradas as $entrada) {
          $data_hora_entrada = $entrada['data_hora_entrada'];
          $id_cliente = $entrada['id_cliente'];
          $id_vaga = $entrada['id_vaga'];
      } 

      $sql2 = $pdo->prepare("SELECT * FROM valor_servico WHERE id=1");
      $sql2->execute();
      $valor_servico = $sql2->fetchAll(PDO::FETCH_ASSOC);
      foreach ($valor_servico as $v) {
          $preco = $v['valor'];
      }

      $strStart = $data_hora_entrada; 
      $strEnd   = $data_hora_saida;
      $dteStart = new DateTime($strStart); 
      $dteEnd   = new DateTime($strEnd);
      $dteDiff  = $dteStart->diff($dteEnd);
      $minutos = $dteDiff->i;
      $horas = $dteDiff->h;
      $dias = $dteDiff->d;
      
      if($dias == 1) {
          $horas2 = $horas + 24;
      } else if ($dias > 1) {
          $horas2 = $horas + (24 * $dias);
      } else {
          $horas2 = $horas;
      }
        
      if($minutos < 10) {
          $tempo = "$horas2:0$minutos";
      } else {
      $tempo = "$horas2:$minutos"; 
      }
       
      if (($dias < 1) && ($horas < 1) && ($minutos < 2)) {
        $valor = 0;
      } else if (($dias < 1) && ($horas < 1)) {
        $valor = $preco;
      } else {   
        $valor = round((($preco/60) * $minutos) + ($preco * $horas) + ($dias * ($preco * 24)));    
      }

      $sql3 = $pdo->prepare("INSERT INTO servicos(id, id_cliente, data_hora_entrada, data_hora_saida, tempo, valor, data_registro)VALUES(:id, :id_cliente, :data_hora_entrada, :data_hora_saida, :tempo, :valor, :data_registro)");

      $sql3->bindValue(':id', $id_entrada_veiculo);
      $sql3->bindValue(':id_cliente', $id_cliente);
      $sql3->bindValue(':data_hora_entrada', $data_hora_entrada);
      $sql3->bindValue(':data_hora_saida', $data_hora_saida);
      $sql3->bindValue(':tempo', $tempo);
      $sql3->bindValue(':valor', $valor);
      $sql3->bindValue(':data_registro', $data_registro);
      $sql3->execute();

      
      $sql4 = $pdo->prepare("DELETE FROM entrada_veiculo WHERE id=:id_entrada_veiculo");
      $sql4->bindValue(':id_entrada_veiculo', $id_entrada_veiculo);
      $sql4->execute();
      
      $sql5 = $pdo->prepare("SELECT * FROM servicos WHERE id=:id_entrada_veiculo");
      $sql5->bindValue(':id_entrada_veiculo', $id_entrada_veiculo);
      $sql5->execute();
      $servicos = $sql5->fetchAll(PDO::FETCH_ASSOC);
      foreach ($servicos as $servico) {
          $id = $servico['id'];
      }
      
      $message = 'Cadastro realizado com sucesso!';

      header("Location: ../../view/home_func_pdf.php?id={$id}");
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