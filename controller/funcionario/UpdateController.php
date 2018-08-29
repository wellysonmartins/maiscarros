<?php
  include_once "../../config.php";
  get_file("model/models");

  function updateController(){
    $funcionario = new Funcionario();
    $funcionario->update();
  }

  updateController();
?>
