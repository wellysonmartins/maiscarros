<?php

  include_once "../../config.php";
  get_file("model/models");

  function delete( $id, $table ){
    $clienteCtrl = new Cliente();
    $clienteCtrl->delete( $id, $table, '' );
	header("Location: ../../view/func_clientes.php");
  }
  
  get_file('controller/GetByIdController');
  $ClienteCtrl = new GetByIdController();
  $clienteArray = $ClienteCtrl->getById($_GET['id'], 'cliente');
  $clienteEdit = $clienteArray[0];


  $clienteTable = 'cliente';
  delete( $_GET['id'], $clienteTable );

?>
