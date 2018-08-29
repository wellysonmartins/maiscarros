<?php
  get_file('model/models');

  class CurrentController {

    public $FuncionarioModel;

    public function __construct(){
      $this->FuncionarioModel = new Funcionario();
    }

    function getCurrentFuncionario() {
      return $this->FuncionarioModel->getLoggedUser();
    }

  }
?>