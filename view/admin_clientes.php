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
              Clientes
            </h2>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-user fa-fw"></i> Clientes</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <?php include 'dashboard/cliente/user-head.php'; ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php include 'dashboard/cliente/all-clientes.php'; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
    
  </div>
  
  <?php include 'dashboard/footer.php'; ?>
