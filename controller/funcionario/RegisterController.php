<?php
  include_once "../../config.php";
  get_file("model/models");

  function RegisterController() {
    $funcionarioCtrl = new Funcionario();
    $funcionarioCtrl->insert();
  }

  RegisterController();
?>