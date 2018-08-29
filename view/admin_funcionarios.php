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
              Funcionários
            </h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-user fa-fw"></i> Funcionários</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <?php include 'dashboard/funcionario/user-head.php'; ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php include 'dashboard/funcionario/all-funcionarios.php'; ?>
                    </tbody>
                  </table>
                </div>
                <div class="col-xs-12">
                    <button type="button" class="btn btn-default"><a style="text-decoration: none;" href="admin_form_cadastro.php"> &nbsp;&nbsp;+&nbsp; Novo &nbsp;&nbsp;&nbsp;</button>
                 </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
  
  <?php include 'dashboard/footer.php'; ?>
