
<?php 
  include_once '../config.php';
  include_once 'dashboard/header.php';
  get_file('controller/CountController');
  $count = new CountController();
?>

<body>
	<div id="wrapper">  

    <?php include 'dashboard/nav.php'; ?>

   	<div id="page-wrapper">
      <div class="container-fluid">
        <div style="margin-top: 55px; width: 950px;" class="row">
          <div class="col-lg-8 col-md-6">
            <div class="panel panel-primary" style="height: 488px;">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-car fa-fw"></i> Serviços</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive" style="max-height: 415px;">
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
          <div class="col-lg-4 col-md-6">
            <div class="panel panel-success">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-usd fa-4x" aria-hidden="true"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                    <div class="huge"><?php $count->allSaldoToday('servicos'); ?></div>
                    <div style="font-size: 15px;"><b>Receita Hoje (<?php echo date('d/m/Y'); ?>)</b></div>
                  </div>
                </div>
              </div>
            </div>   
            <div class="panel panel-primary">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-12">
                    <h3 class="panel-title"><i class="fa fa-search"></i> Pesquisar receita</h3>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <div class="table-responsive" style="max-height: 400px; height:296px;">
                  <form class="form-horizontal" style="width:200px;" action="../controller/valor_servico/SearchController.php" method="post" enctype="multipart/form-data" autocomplete="off">
  				          <div class="form-group">
  				            <label class="col-sm-2 control-label">De:</label>
  				            <div class="col-sm-9">
  				              <input style="width: 200px;" type="date" class="form-control" name="date01" placeholder="" required>
  				            </div>
  				          </div>
                    <div class="form-group">
  				            <label class="col-sm-2 control-label">Até:</label>
  				            <div class="col-sm-9">
  				              <input style="width: 200px;" type="date" class="form-control" name="date02" placeholder="" required>
  				            </div>
  				          </div>
                    <div class="col-xs-12">
                      <button style="margin-left:45px; margin-bottom:40px; width: 120px;" type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Pesquisar</button>
                    </div>
                  </form>
                  <table class="table table-bordered table-hover table-striped">
                    <tbody>
                      <?php include 'dashboard/valor_servico/all-valor-pesquisa.php'; ?>
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


  

