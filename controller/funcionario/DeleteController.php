<?php

  include_once "../../config.php";
  get_file("model/models");

  function delete( $id ){
    $funcionarioCtrl = new Funcionario();
    $funcionarioCtrl->delete( $id, 'usuario', 'view/admin_funcionarios' );
  }

  delete( $_GET['id'] );

?>