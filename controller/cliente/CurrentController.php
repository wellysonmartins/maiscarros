<?php
  get_file('models/models');

  class CurrentController {

    public $ClienteModel;

    public function __construct(){
      $this->ClienteModel = new Cliente();
    }

    function getCurrentCliente() {
      return $this->ClienteModel->getLoggedUser();
    }

  }
?>