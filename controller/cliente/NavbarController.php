<?php
  get_file('models/models');

  class NavbarController {

    public $ClienteModel;

    public function __construct(){
      $this->ClienteModel = new Cliente();
    }

    function getName() {
      return $this->ClienteModel->getName();
    }
  }
?>