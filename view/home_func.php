<?php 
  include_once '../config.php';
  include_once 'funcionario/header.php';
  include_once 'funcionario/nav.php';
?>
  
  <div style="margin-top: 20px; width: 1169px;" class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-md-6">
        <div class="panel panel-primary" style="border-radius: 5px 5px 5px 15px;">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-car fa-fw"></i> Entrada de veículo</h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-striped">
                <tbody>
                  <?php include 'funcionario/estacionamento/cadastro.php'; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="panel panel-red">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-car fa-fw"></i> Saída de veículo</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped">
                    <tbody>
                      <?php include 'funcionario/estacionamento/cadastro-saida.php'; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6" >
            <div class="panel panel-green" style="height:193px;">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-usd fa-fw"></i> Valor do serviço</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table style="margin-top:30px;" class="table table-bordered table-hover table-striped">
                    <tbody>
                      <?php include 'funcionario/estacionamento/all-valor.php'; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>  
        <div class="panel panel-primary" style="height: 256px; border-radius: 5px 5px 15px 5px;" >
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-car fa-fw"></i> Serviços</h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive" style="max-height: 190px;">
              <table class="table table-bordered table-hover table-striped">
                <thead>
                  <tr>
                    <?php include 'funcionario/estacionamento/user-head-servicos.php'; ?>
                  </tr>
                </thead>
                <tbody>
                  <?php include 'funcionario/estacionamento/all-servicos.php'; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <?php include 'funcionario/footer.php'; ?>
     

  
