<?php

  class CRUD extends Database {

    public function delete( $id, $table, $redirectPage ) {
      echo "<script>confirm('Tem certeza que deseja apagar esse registro?')</script>";
      $pdo = parent::connect();
      $sql = $pdo->prepare("DELETE FROM $table WHERE id=:id");
      $sql->bindValue(':id', $id);
      $sql->execute();

      $message = 'Registro excluido com sucesso!';
      header("Location: ../../" . $redirectPage . ".php?message={$message}");
    }

    public function userType( $table ) {

      if( !empty($_SESSION['login']) || !empty($_SESSION['senha']) ) {
        $pdo = parent::connect();
        $user = $pdo->prepare("SELECT * FROM $table WHERE login=:login and senha=:senha");

        $user->bindValue(':login', $_SESSION['login']);
        $user->bindValue(':senha', $_SESSION['senha']);
        $user->execute();

        $rowUser = $user->rowCount();

        return $rowUser;
      }
    }

    public function count( $table ) {
      $pdo = parent::connect();
      $busca = $pdo->prepare("SELECT count(*) as total FROM $table");
      $busca->execute();
      $result = $busca->fetchColumn();
      echo $result;
    }

    public function countSaldo( $table ) {
      $pdo = parent::connect();
      $busca = $pdo->prepare("SELECT sum(valor) as total FROM $table");
      $busca->execute();
      $result = $busca->fetchColumn();
      echo number_format($result,2,",",".");
    }

    public function countSaldoToday( $table ) {
      $pdo = parent::connect();
      date_default_timezone_set('America/Bahia');
      $today = date('Y/m/d');

      $busca = $pdo->prepare("SELECT sum(valor) as total FROM $table WHERE data_registro = :today");
      $busca->bindValue(':today', $today);
      $busca->execute();
      $result = $busca->fetchColumn();
      echo number_format($result,2,",",".");
    }

    public function readAllServicos( $table1, $table2 ) {
      $pdo = parent::connect();
      $busca = $pdo->prepare("SELECT s.data_hora_saida, s.id, c.nomeCliente, s.data_hora_entrada, s.tempo, s.valor FROM $table1 AS s, $table2 AS c WHERE s.id_cliente = c.id");
      $busca->execute();

      $linha = $busca->fetchAll(PDO::FETCH_ASSOC);

      return $linha;
    }

    public function readAllClientes( $table ) {
      $pdo = parent::connect();
      $busca = $pdo->prepare("SELECT * FROM $table");
      $busca->execute();

      $linha = $busca->fetchAll(PDO::FETCH_ASSOC);

      return $linha;
    }

    public function readAll( $table ) {
      $pdo = parent::connect();
      $busca = $pdo->prepare("SELECT * FROM $table");
      $busca->execute();

      $linha = $busca->fetchAll(PDO::FETCH_ASSOC);

      return $linha;
    }

    public function readCliente( $table ) {
      $pdo = parent::connect();
      $busca = $pdo->prepare("SELECT * FROM cliente WHERE nomeCliente LIKE :nomeCliente OR id LIKE :nomeCliente OR cpf LIKE :nomeCliente");
      $busca->bindValue(':nomeCliente', $table);
      $busca->execute();

      $linha = $busca->fetchAll(PDO::FETCH_ASSOC);

      return $linha;
    }

     public function readVeiculo( $table ) {
      $pdo = parent::connect();
      $busca = $pdo->prepare("SELECT * FROM entrada_veiculo WHERE id LIKE :veiculo OR placa LIKE :veiculo OR id_vaga LIKE :veiculo");
      $busca->bindValue(':veiculo', $table);
      $busca->execute();

      $linha = $busca->fetchAll(PDO::FETCH_ASSOC);

      return $linha;
    }

    public function getById( $id, $table ) {
      $pdo = parent::connect();
      $busca = $pdo->prepare("SELECT * FROM $table WHERE id = :id");
      $busca->bindValue(':id', $id);
      $busca->execute();

      return $busca->fetchAll(PDO::FETCH_ASSOC);
    }  
  }

?>