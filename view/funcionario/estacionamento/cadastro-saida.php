<body>
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-lg-12">
            	<div class="form-group">
					<div class="col-sm-12">
				    	<form action="home_func.php" method="get">
                    		<label style="color: #104E8B;" class="col-sm-12 control-label">Pesquisar veículo:</label>
                    		<input style="margin-bottom: 10px;" class="form-control" type="text" name="getVeiculo" placeholder="Código, Vaga ou Placa">
                		</form>
				    </div>
				</div>
                <form class="form-horizontal" action="../controller/entrada/RegisterSaidaController.php" method="post" enctype="multipart/form-data" target="_blank">
					<div class="col-sm-12">
				    	<label class="col-sm-3 control-label">Veículo</label>
				      	<select style="margin-bottom: 10px;" class="form-control" name="id">
				      		
				        	
				        	<?php
				        			get_file('controller/GetAllController');
				        			$getAllCtrl = new GetAllController();
				        			if(isset($_GET["getVeiculo"])) {
				        				$getVeiculo = $_GET["getVeiculo"];
				        				$veiculos = $getAllCtrl->getVeiculo($getVeiculo); 
				          			} else {
				          				$veiculos = $getAllCtrl->getAll('entrada_veiculo'); 
				          				?> <option>Escolha um veículo</option> <?php
				          			} 

				        			foreach ($veiculos as $veiculo) { ?>
				          
				          				<option value="<?php echo $veiculo['id'];?>"><?php echo "Código: " . $veiculo['id'] . " - Vaga: " . $veiculo['id_vaga'] . " - Placa: " . $veiculo['placa']; ?>
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
         