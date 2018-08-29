<?php
  get_file('controller/GetAllController');
  $getAllCtrl = new GetAllController();
  $funcionarios = $getAllCtrl->getAll('usuario');

  foreach ($funcionarios as $funcionario) { ?>
    
  <tr>
    <td style="text-align: center;" ><?php echo $funcionario['id']; ?></td>
    <td><?php echo $funcionario['nome']; ?></td>
    <td><?php echo $funcionario['login']; ?></td>
    <td>
        <a class="icon-table" href="admin_form_edita.php?id=<?php echo $funcionario['id']; ?>">
            <i class="glyphicon glyphicon-pencil" style="margin-left: 18px;"></i>
        </a>
    </td>
    <td>
      <a class="icon-table" href="./../controller/funcionario/DeleteController.php?id=<?php echo $funcionario['id']; ?>">
         <i class="glyphicon glyphicon-trash" style="margin-left: 18px;" ></i>
      </a>
    </td> 
  </tr>

  <?php } ?>