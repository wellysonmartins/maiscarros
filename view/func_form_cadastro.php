<?php 
  include_once '../config.php';
  include_once 'funcionario/header.php';
  include_once 'funcionario/nav.php';
?>
  
  <div style="width: 1169px; margin-top: 20px; height:500px;" class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-user fa-fw"></i> Novo cliente</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-8">
                <?php include 'funcionario/cliente/form-cliente.php'; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <?php include 'funcionario/footer.php'; ?>
