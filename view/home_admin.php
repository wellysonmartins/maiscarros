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
          <div class="col-lg-4 col-md-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-car fa-fw"></i> Vagas</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive" style="max-height: 180px; height: 180px;">
                  <table class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <?php include 'dashboard/vagas/user-head.php'; ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php include 'dashboard/vagas/all-vagas.php'; ?>
                    </tbody>
                  </table>
                </div>
                <h4 style=" text-align: center;">Adicionar vaga</h4>
                <form class="form-horizontal" action="../controller/vagas/RegisterController.php" method="post" enctype="multipart/form-data" autocomplete="off">
        				  <div style="margin-left: 22px;" class="form-group">
				            <label class="col-sm-3 control-label">Vaga</label>
				            <div class="col-sm-9">
				              <input style="width: 60px;" type="text" class="form-control" name="id" placeholder="" required>
				            </div>
				          </div>
				          <div class="col-xs-12">
                    <button style="margin-left: 60px;" type="submit" class="btn btn-primary">+&nbsp; Adicionar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="panel panel-green">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-usd fa-fw"></i> Valor do serviço</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive" style="max-height: 180px; height: 180px;">
                  <table  style="margin-top: 30px;" class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <?php include 'dashboard/valor_servico/user-head.php'; ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php include 'dashboard/valor_servico/all-valor-servico.php'; ?>
                    </tbody>
                  </table>
                </div>
                <h4 style=" text-align: center;">Alterar valor</h4>
                <form class="form-horizontal" action="../controller/valor_servico/UpdateController.php" method="post" enctype="multipart/form-data" autocomplete="off">
                  <div style="margin-left: 22px;" class="form-group">
				            <label class="col-sm-3 control-label">Valor</label>
				            <div class="col-sm-9">
				              <input style="width: 90px;" type="text" class="form-control" name="valor" placeholder="" required>
				            </div>
				          </div>
                  <div class="col-xs-12">
                    <button style="margin-left: 60px; width: 100px;" type="submit" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i> Alterar</button>
                  </div>
                </form>
              </div>
  			    </div>
			    </div>
    			<div class="col-lg-4 col-md-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-user fa-5x" aria-hidden="true"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                    <div class="huge"><?php $count->allItens('usuario'); ?></div>
                    <div>Funcionários</div>
                  </div>
                </div>
              </div>
              <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                  <li class="panel-title">
                    <a href="admin_funcionarios.php"><i class="fa fa-user"></i>
                      Ver todos os funcionários 
                    </a>
                  </li>
                </ul>
              </div>
              <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                  <li class="panel-title">
                    <a href="admin_form_cadastro.php"><i class="fa fa-plus-circle"></i>
                      Cadastrar funcionário 
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="panel panel-success">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-usd fa-5x" aria-hidden="true"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                    <div class="huge"><?php $count->allSaldoToday('servicos'); ?></div>
                    <div style="font-size: 20px;">Receita Hoje (<?php echo date('d/m/Y'); ?>)</div>
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


  

