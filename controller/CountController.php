<?php
  get_file('model/models');

  class CountController {

    public $CRUDModel;

    public function __construct(){
      $this->CRUDModel = new CRUD();
    }

    function allItens( $table ) {
      $this->CRUDModel->count( $table );
    }

    function allSaldo( $table ) {
      $this->CRUDModel->countSaldo( $table );
    }

    function allSaldoToday( $table ) {
      $this->CRUDModel->countSaldoToday( $table );
    }

  }
?>