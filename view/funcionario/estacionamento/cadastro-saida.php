<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <form class="form-horizontal" action="../controller/entrada/RegisterSaidaController.php" method="post" enctype="multipart/form-data" target="_blank">
					<div class="col-sm-12">
				    	<label class="col-sm-3 control-label">Veículo</label>
				      	<select style="margin-bottom: 10px;" class="form-control" name="id">
				      		<option>Escolha um veículo</option>
				        	<?php
				        	get_file('controller/GetAllController');
				        	$getAllCtrl = new GetAllController();
				        	$clientes = $getAllCtrl->getAll('entrada_veiculo');
				        
				        	foreach ($clientes as $cliente) { ?>
				          
				        	  	<option value="<?php echo $cliente['id'];?>"><?php echo "Código: " . $cliente['id'] . " - Vaga: " . $cliente['id_vaga'] . " - Placa: " . $cliente['placa']; ?>
				        	  	</option>
				        	<?php } ?>
				      	</select>
				    </div>
				    <div class="form-group">
				    	<div class="col-sm-9">
				      		<button style="margin-left: 15px;" type="submit" class="btn btn-danger">Encerrar</button>
				    	</div>
				  	</div>
				</form>
            </div>
        </div>
    </div>
         