<?php

  class Valor extends CRUD {

    public function update() {
      $pdo = parent::connect();

      $valor =   $_POST['valor'];
      
      if( !empty( $valor ) ) {
        $sql = $pdo->prepare("UPDATE valor_servico SET valor=:valor WHERE id=1");
        $sql->bindValue(':valor', $valor);
        $sql->execute();
      }

      $message = 'Valor atualizado com sucesso!';
      header("Location: ../../view/home_admin.php?message={$message}");
    }
      
    public function pesquisaReceita() {
      $pdo = parent::connect();

      $date01 =   $_POST['date01'];
      $date02 =   $_POST['date02'];
      
      $busca = $pdo->prepare("SELECT sum(valor) as total FROM servicos WHERE data_registro BETWEEN :date01 AND :date02");
      $busca->bindValue(':date01', $date01);
      $busca->bindValue(':date02', $date02);
      $busca->execute();
      $result = $busca->fetchColumn();
        
      $sql = $pdo->prepare("UPDATE pesquisa SET total=:result, de=:date01, ate=:date02 WHERE id=1");
      $sql->bindValue(':result', $result);
      $sql->bindValue(':date01', $date01);
      $sql->bindValue(':date02', $date02);
      $sql->execute();
      
      header("Location: ../../view/admin_financeiro.php");
    }
  }

?>