<?php
  get_file('controller/GetAllController');
  $getAllCtrl = new GetAllController();
  $clientes = $getAllCtrl->getAll('cliente');

  foreach ($clientes as $cliente) { ?>
    
   <tr>
      <td style="text-align: center;" ><?php echo $cliente['id']; ?></td>
      <td><?php echo $cliente['nomeCliente']; ?></td>
      <td><?php echo $cliente['dataNascimento']; ?></td>
      <td><?php echo $cliente['cpf']; ?></td>
      <td><?php echo $cliente['telefone']; ?></td> 
      <td><?php echo $cliente['email']; ?></td>
    </tr>

  <?php } ?>