<form class="form-horizontal" action="../controller/cliente/RegisterController.php" method="post" enctype="multipart/form-data" autocomplete="off">

  
  <div class="form-group">
    <label class="col-sm-3 control-label">Nome</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="nomeCliente" placeholder="Nome completo" required>
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-3 control-label">Data de Nascimento</label>
    <div class="col-sm-9">
      <input type="date" class="form-control" name="dataNascimento" placeholder="Data de Nascimento" required>
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-3 control-label">CPF</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="cpf" placeholder="CPF" required>
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-3 control-label">Telefone</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="telefone" placeholder="Número de telefone" required>
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-3 control-label">E-mail</label>
    <div class="col-sm-9">
      <input type="email" class="form-control" name="email" placeholder="E-mail" required>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
  </div>

</form>