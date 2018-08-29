<?php
  get_file('model/models');

  class HeaderController {

    public $BuyModel;
    public $ClienteModel;

    public function __construct(){
      $this->BuyModel = new Buy();
      $this->ClienteModel = new Cliente();
    }

    function getUserName() {
      $username = $this->ClienteModel->loggedUserName();
      return $username;
    } 

    function getTotal() {
      $total = $this->BuyModel->buyTotal();
    }

    function getItens() {
      $totalItens = $this->BuyModel->buyTotaltens();
      echo $totalItens;
    }

  }
?>