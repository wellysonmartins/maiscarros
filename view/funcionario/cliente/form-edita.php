<?php
  get_file('controller/GetByIdController');
  $clienteCtrl = new GetByIdController();
  $clienteArray = $clienteCtrl->getById($_GET['id'], 'cliente');
  $clienteEdit = $clienteArray[0];
?>

<form class="form-horizontal" action="../controller/cliente/UpdateController.php" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label class="col-sm-3 control-label">id</label>
    <div class="col-sm-9">
      <input readonly="true" type="text" class="form-control" name="id" placeholder="id" value="<?php echo $clienteEdit['id']; ?>">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-3 control-label">nome</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="nomeCliente" placeholder="nome" value="<?php echo $clienteEdit['nomeCliente']; ?>">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-3 control-label">data de nascimento</label>
    <div class="col-sm-9">
      <input type="date" class="form-control" name="dataNascimento" placeholder="Data de nascimento" value="<?php echo $clienteEdit['dataNascimento']; ?>">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-3 control-label">CPF</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="cpf" placeholder="CPF" value="<?php echo $clienteEdit['cpf']; ?>">
    </div>
  </div> 

  <div class="form-group">
    <label class="col-sm-3 control-label">Telefone</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="telefone" placeholder="Número de telefone" value="<?php echo $clienteEdit['telefone']; ?>">
    </div>
  </div> 

  <div class="form-group">
    <label class="col-sm-3 control-label">E-mail</label>
    <div class="col-sm-9">
      <input type="email" class="form-control" name="email" placeholder="E-mail" value="<?php echo $clienteEdit['email']; ?>">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" class="btn btn-primary">Atualizar</button>
    </div>
  </div>

</form>