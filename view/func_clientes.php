<?php 
  include_once '../config.php';
  include_once 'funcionario/header.php';
  include_once 'funcionario/nav.php';
?>
  
  <div style="width: 1169px; margin-top: 20px; height:500px;" class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-primary" style="margin-top:-15px;">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-user fa-fw"></i> Clientes</h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-striped">
                <thead>
                  <tr>
                    <?php include 'funcionario/cliente/user-head.php'; ?>
                  </tr>
                </thead>
                <tbody>
                  <?php include 'funcionario/cliente/all-clientes.php'; ?>
                </tbody>
              </table>
            </div>
            <div class="col-xs-12">
              <button type="button" class="btn btn-default"><a style="text-decoration: none;" href="func_form_cadastro.php">&nbsp;&nbsp;+&nbsp; Novo &nbsp;&nbsp;&nbsp;</a></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    
  <?php include 'funcionario/footer.php'; ?>
    
