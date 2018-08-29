<?php 
  include_once '../config.php';
  include_once 'dashboard/header.php';
?>

<body>
  <div id="wrapper">

    <?php include 'dashboard/nav.php'; ?>

    <div id="page-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="page-header">
              Cadastrar funcionário
            </h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-user fa-fw"></i> Novo funcionário</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-8">
                      <?php include_once 'dashboard/funcionario/cadastro.php'; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
  
  <?php include 'dashboard/footer.php'; ?>
