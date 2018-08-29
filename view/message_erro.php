<?php
//FUNÇÃO PARA CRIAR A SEÇÃO DE ALERTA
session_start();
function mostraAlerta($tipo)
{
    if (isset($_SESSION[$tipo])) :
   ?>
   		<div class='text-center alert alert-<?=$tipo?>' role="alert" style="margin-top: 20px; margin-bottom: -20px; font-size: 15px;">
      	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?= $_SESSION[$tipo]?>
    	</div>
	<?php
        unset($_SESSION[$tipo]);
    endif;
}
