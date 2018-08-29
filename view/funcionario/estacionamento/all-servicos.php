<?php
  get_file('controller/GetAllController');
  $getAllCtrl = new GetAllController();
  $servicos = $getAllCtrl->getAllServicos('servicos', 'cliente');
  rsort($servicos);

  foreach ($servicos as $servico) { ?>
    <tr>
      <td style="text-align: center;" ><?php echo $servico['id']; ?></td>
      <td style="text-align: center;" ><?php echo $servico['nomeCliente']; ?></td>
      <td style="text-align: center;"><?php echo date('d/m/Y H:i:s', strtotime($servico['data_hora_entrada'])); ?></td>
      <td style="text-align: center;"><?php echo date('d/m/Y H:i:s', strtotime($servico['data_hora_saida'])); ?></td>
      <td style="text-align: center;"><?php echo $servico['tempo']; ?></td> 
      <td style="text-align: center;">R$ <?php echo number_format($servico['valor'],2,",","."); ?></td> 
      <td style="text-align: center;">
        <a href="home_func_pdf.php?id=<?php echo $servico['id']; ?>" target="_blank"><i class="fa fa-file-text-o fa-lg"></i></a>
      </td>
    </tr>
  <?php } ?>