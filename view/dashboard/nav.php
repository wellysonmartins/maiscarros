<?php
  get_file('controller/funcionario/NavbarController');
  $navbar = new NavbarController();
  $navbar->auth();
  $name = $navbar->getName();
  $login = $navbar->getLogin();
  if($login != "admin") {
      header("Location: ../view/home_func.php");
  }
?>

<div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="home_admin.php">Mais Carros</a>
        </div>
        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="home_func.php"><i class="fa fa-home fa-fw"></i> Home - Sistema</a></li>
        </ul>
        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown">
                <a class="dropdown-toggle" href="../controller/logout_controller.php">
                    <?php echo $name ?> <i class="fa fa-sign-out fa-fw"></i> Sair
                </a>
            </li>
        </ul>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="home_admin.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="admin_funcionarios.php"><i class="fa fa-user fa-fw"></i> Funcionários</a>
                    </li>
                    <li>
                        <a href="admin_clientes.php"><i class="fa fa-user fa-fw"></i> Clientes</a>
                    </li>
                    <li>
                        <a href="admin_financeiro.php"><i class="fa fa-line-chart fa-fw"></i> Financeiro</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
