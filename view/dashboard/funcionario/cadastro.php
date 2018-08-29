
                        <form class="form-horizontal" action="../controller/funcionario/RegisterController.php" method="post" enctype="multipart/form-data" autocomplete="off">

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nome</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" name="nome" placeholder="Nome" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Usuário</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="login" placeholder="Usuário" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Senha</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="senha" placeholder="senha" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                </div>
                            </div>
                        </form>
                    
