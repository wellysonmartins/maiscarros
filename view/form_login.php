<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100 p-t-10 p-b-30">
			<form class="login100-form validate-form" action="controller/login_controller.php" method="post" autocomplete="off">
				<span class="login100-form-avatar">
					<img src="view/images/logo.png" alt="AVATAR">
				</span>
				<div class="wrap-input100 validate-input m-t-30 m-b-35" data-validate = "Digite o Usuário!">
					<input class="input100" type="text" name="login">
					<span class="focus-input100" data-placeholder="Usuário"></span>
				</div>
				<div class="wrap-input100 validate-input m-b-50" data-validate="Digite a Senha!">
					<input class="input100" type="password" name="senha">
					<span class="focus-input100" data-placeholder="Senha"></span>
				</div>
				<div class="container-login100-form-btn">
					<button class="login100-form-btn">
						Entrar
					</button>
				</div>
				<div>
					<?php 
					include 'view/message_erro.php'; 
            		mostraAlerta('danger');
					?>
				</div>
			</form>
		</div>
	</div>
</div>
	
	
