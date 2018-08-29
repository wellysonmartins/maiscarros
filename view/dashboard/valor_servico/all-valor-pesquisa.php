<?php
  get_file('controller/GetAllController');
  $getAllCtrl = new GetAllController();
  $valores = $getAllCtrl->getAll('pesquisa');

  foreach ($valores as $valor) { ?>
   <tr>
    <td style="text-align: center; font-size: 15px;" ><b>De: <?php echo date('d/m/Y', strtotime($valor['de'])); ?></b></td> 
       <td style="text-align: center; font-size: 15px;" ><b>Até: <?php echo date('d/m/Y', strtotime($valor['ate'])); ?></b></td>
    </tr> 
   <tr>
    <td colspan="2" style="text-align: center; font-size: 30px;" >R$ <?php echo number_format($valor['total'],2,",","."); ?></td> 
    </tr>

  <?php } ?>