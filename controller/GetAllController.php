<?php
  get_file('model/models');

  class GetAllController {

    public $CRUDModel;

    public function __construct(){
      $this->CRUDModel = new CRUD();
    }

    function getAllServicos( $table1, $table2 ) {
      return $this->CRUDModel->readAllServicos( $table1, $table2 );
    }

    function getAllClientes( $table ) {
      return $this->CRUDModel->readAllClientes( $table );
    }

    function getAll( $table ) {
      return $this->CRUDModel->readAll( $table );
    }

    function getCliente( $table ) {
      return $this->CRUDModel->readCliente( $table );
    }

    function getVeiculo( $table ) {
      return $this->CRUDModel->readVeiculo( $table );
    }

  }
?>