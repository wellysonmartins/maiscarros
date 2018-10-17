<?php
  get_file('controller/funcionario/NavbarController');
  $navbar = new NavbarController();
  $navbar->auth();
  $name = $navbar->getName();
?>
	<div class="container" style="margin-top:-12px;>
		<div class="main">
			<nav class="cbp-hsmenu-wrapper" id="cbp-hsmenu-wrapper">
				<div class="cbp-hsinner">
					<ul class="cbp-hsmenu">
						<li><a href="home_func.php"> Home</a></li>
						<li><a href="func_clientes.php">Clientes</a></li>
						<li>
							<a href="#">Vagas</a>
							<ul class="cbp-hssubmenu cbp-hssub-rows">
								<?php
							        get_file('controller/GetAllController');
							        $getAllCtrl = new GetAllController();
							        $vagas = $getAllCtrl->getAll('vagas');
                                    sort($vagas);
							        $vagasOcupadas = $getAllCtrl->getAll('entrada_veiculo');

							        foreach ($vagasOcupadas as $vagaOcupada) {
							        	$result[$vagaOcupada['id_vaga']] = $vagaOcupada['id_vaga'];
							        }

							        foreach ($vagas as $vaga) {
							        	$variavel = $vaga['id'];
							        		if(!empty($result[$variavel])){
								        		if ($result[$variavel] != $vaga['id']) { ?>
													<li class="vaga"><div id="vagaDisponivel"><?php echo $vaga['id']?></div><span id="tituloVagaDisponivel">DISPONÍVEL</span></li>
												<?php } else { ?>
													<li class="vaga"><div id="vagaOcupada"><?php echo $vaga['id']?></div><span id="tituloVagaOcupada">OCUPADA</span></li>

									<?php }  }  else { ?>
										<li class="vaga"><div id="vagaDisponivel"><?php echo $vaga['id']?></div><span id="tituloVagaDisponivel">DISPONÍVEL</span></li>
									<?php } } ?>
							</ul>
						</li>     
						<li class="pull-right"><a href="../controller/logout_controller.php">Sair <i class="fa fa-sign-out"></i></a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
