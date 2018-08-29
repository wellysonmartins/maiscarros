<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <form class="form-horizontal" target="_blank" action="../controller/entrada/RegisterController.php" method="post" enctype="multipart/form-data" autocomplete="off">
	  				<div class="form-group">
				  		<div class="col-sm-12">
				      		<label class="col-sm-3 control-label">Cliente</label>
				      		<select style="margin-bottom: 10px;" class="form-control" name="id_cliente">
				      			<option>Escolha um cliente</option>
				        		<?php
				        			get_file('controller/GetAllController');
				        			$getAllCtrl = new GetAllController();
				        			$clientes = $getAllCtrl->getAll('cliente'); 
				          
				        			foreach ($clientes as $cliente) { ?>
				          
				          				<option value="<?php echo $cliente['id'];?>"><?php echo $cliente['id'] . " - " . $cliente['nomeCliente'] . " - CPF: " . $cliente['cpf']; ?></option>
				                      
				        			<?php } ?>
				      		</select>
				    	</div>
				  	</div>
	         		<div class="form-group">
				    	<div class="col-sm-12">
				      		<label class="col-sm-3 control-label">Placa</label>
				      		<input style="margin-bottom: 10px;" type="text" class="form-control" name="placa" placeholder="Placa do carro" required>
				    	</div>
				  	</div>

					<div class="form-group">
				    	<div class="col-sm-12">
				      		<label class="col-sm-3 control-label">Modelo</label>
				      		<input style="margin-bottom: 10px;" type="text" class="form-control" name="modelo" placeholder="Modelo do carro" required>
				    	</div>
	 				</div>

				  	<div class="form-group">
				    	<div class="col-sm-12">
				      		<label class="col-sm-3 control-label">Cor</label>
				      		<input style="margin-bottom: 10px;" type="text" class="form-control" name="cor" placeholder="Cor do carro" required>
				    	</div>
				  	</div>

				  	<div class="form-group">
				  		<div class="col-sm-12">
				      		<label class="col-sm-6 control-label">Vagas disponíveis</label>
				      		<select style="margin-bottom: 10px;" class="form-control" name="id_vaga">
				      			<option>Escolha uma vaga</option>
				        		<?php
				        			get_file('controller/GetAllController');
				        			$getAllCtrl = new GetAllController();
				        			$vagas = $getAllCtrl->getAll('vagas');
				        			$vagasOcupadas = $getAllCtrl->getAll('entrada_veiculo');
				        			sort($vagas);
				          
				        			foreach ($vagasOcupadas as $vagaOcupada) {
						  				$result[$vagaOcupada['id_vaga']] = $vagaOcupada['id_vaga'];
				        			}
				          
				        			foreach ($vagas as $vaga) { 
				          				$variavel = $vaga['id'];
				            
				                		if ($result[$variavel] != $vaga['id']) { ?>
				          					<option value="<?php echo $vaga['id'];?>"><?php echo $vaga['id'];?></option>
				        		<?php } } ?>
					        </select>
				    	</div>
				  	</div>

				  	<div class="form-group">
				    	<div class="col-sm-9">
				      		<button type="submit" class="btn btn-primary">Adicionar</button>
				    	</div>
				  	</div>
				</form>
            </div>
        </div>
    </div>
         