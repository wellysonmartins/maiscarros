<?php
  include_once "../../config.php";
  get_file("model/models");

  function RegisterSaidaController() {
    $funcionarioCtrl = new Entrada();
    $funcionarioCtrl->insertSaida();
  }

  RegisterSaidaController();
?>