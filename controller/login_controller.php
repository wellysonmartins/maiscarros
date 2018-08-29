<?php
  function login(){
    include '../model/DatabaseModel.php';
    $db = new Database;
    $db->login();
  }

  login();
?>