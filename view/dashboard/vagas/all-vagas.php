<?php
  get_file('controller/GetAllController');
  $getAllCtrl = new GetAllController();
  $vagas = $getAllCtrl->getAll('vagas');
  sort($vagas);

  foreach ($vagas as $vaga) { ?>
    
  <tr>
    <td style="text-align: center;" ><?php echo $vaga['id']; ?></td>
    <td>
      <a class="icon-table" href="./../controller/vagas/DeleteController.php?id=<?php echo $vaga['id']; ?>">
         <i class="glyphicon glyphicon-trash" style="margin-left: 15px;" ></i>
      </a>
    </td> 
  </tr>

  <?php } ?>