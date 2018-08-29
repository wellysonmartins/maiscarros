<?php
  get_file('controller/GetAllController');
  $getAllCtrl = new GetAllController();
  $valores = $getAllCtrl->getAll('valor_servico');

  foreach ($valores as $valor) { ?>
    
   <tr>
   	<td style="text-align: center; font-size: 25px;" >R$ <?php echo number_format($valor['valor'],2,",","."); ?> / hora
    </td> 
   </tr>

  <?php } ?>