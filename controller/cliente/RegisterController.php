<?php
  include_once "../../config.php";
  get_file("model/models");

  function RegisterClienteController() {
    $ClienteCtrl = new Cliente();
    $ClienteCtrl->insert();
  }

  RegisterClienteController();
?>