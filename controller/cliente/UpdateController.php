<?php
  include_once "../../config.php";
  get_file("model/models");

  function updateController(){
    $cliente = new Cliente();
    $cliente->update();
  }

  updateController();
?>
