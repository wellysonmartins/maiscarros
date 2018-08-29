<?php
  get_file('model/models');

  class NavbarController {

    public $FuncionarioModel;

    public function __construct(){
      $this->FuncionarioModel = new Funcionario();
    }

    function getName() {
      return $this->FuncionarioModel->getName();
    }
      
    function getLogin() {
      return $this->FuncionarioModel->getLogin();
    }

    function auth() {
      $this->FuncionarioModel->auth();
    }

  }
?>