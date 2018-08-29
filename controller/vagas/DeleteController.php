<?php

  include_once "../../config.php";
  get_file("model/models");

  function delete( $id ){
    $funcionarioCtrl = new Vagas();
    $funcionarioCtrl->delete( $id, 'vagas', 'view/home_admin' );
  }

  delete( $_GET['id'] );

?>