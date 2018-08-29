<?php
  include_once "../../config.php";
  get_file("model/models");

  function searchController(){
    $pesquisa = new Valor();
    $pesquisa->pesquisaReceita();
  }

  searchController();
?>
