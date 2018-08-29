<?php
  include_once "../../config.php";
  get_file("model/models");

  function RegisterController() {
    $ClienteCtrl = new Entrada();
    $ClienteCtrl->insert();
  }

  RegisterController();
?>