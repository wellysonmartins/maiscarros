<?php
  get_file('controllers/funcionario/CurrentController');
  $current = new CurrentController();
  $funcionarioArray = $current->getCurrentFuncionario();

  foreach ($funcionarioArray as $funcionario) { ?>
    <tr>
      <td><?php echo $funcionario['id']; ?></td>
      <td><?php echo $funcionario['nomeCliente']; ?></td>
      <td><?php echo $funcionario['email']; ?></td>
    </tr>

  <?php } ?>