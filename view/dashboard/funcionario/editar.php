
                        <?php
                            get_file('controller/GetByIdController');
                            $funcionarioCtrl = new GetByIdController();
                            $funcionarioArray = $funcionarioCtrl->getById($_GET['id'], 'usuario');
                            $funcionarioEdit = $funcionarioArray[0];
                        ?>

                        <form class="form-horizontal" action="../controller/funcionario/UpdateController.php" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label class="col-sm-3 control-label">id</label>
                                <div class="col-sm-9">
                                    <input readonly="true" type="text" class="form-control" name="id" placeholder="id" value="<?php echo $funcionarioEdit['id']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">nome</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nome" placeholder="nome" value="<?php echo $funcionarioEdit['nome']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">usuário</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="login" placeholder="usuario" value="<?php echo $funcionarioEdit['login']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">senha</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="senha" placeholder="senha">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-success">Atualizar</button>
                                </div>
                            </div>
                        </form>
                    
