<?php
  get_file('controller/GetAllController');
  $getAllCtrl = new GetAllController();
  $clientes = $getAllCtrl->getAllClientes('cliente');

  foreach ($clientes as $cliente) { ?>
    <tr>
      <td style="text-align: center;" ><?php echo $cliente['id']; ?></td>
      <td><?php echo $cliente['nomeCliente']; ?></td>
      <td><?php echo date('d/m/Y', strtotime($cliente["dataNascimento"])); ?></td>
      <td><?php echo $cliente['cpf']; ?></td>
      <td><?php echo $cliente['telefone']; ?></td> 
      <td><?php echo $cliente['email']; ?></td>
      <td>
        <a class="icon-table" href="func_form_edita.php?id=<?php echo $cliente['id']; ?>">
            <i class="glyphicon glyphicon-pencil" style="margin-left: 18px;"></i>
        </a>
    </td>
    <td>
      <a class="icon-table" href="./../controller/cliente/DeleteController.php?id=<?php echo $cliente['id']; ?>">
         <i class="glyphicon glyphicon-trash" style="margin-left: 18px;" ></i>
      </a>
    </td> 
    </tr>
      
  <?php } ?>