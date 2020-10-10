<!DOCTYPE html>
<html>
<head>
	<?php require __DIR__.'/../layout/links.php'; ?>
	<title>Eloquent Project - Login</title>
</head>
<body>

	<?php
		component('views/components/navbar', ['session'=>$session,'object'=>$obj]);
	?>

	<div id="content">
		<div class="bg bg-dark"></div>

		<div class="row m-0 mt-5 pt-5">
			
			<form class="form-group row col-sm-4 m-auto p-4 border border-secondary rounded bg-light" method="POST" action="/login/auth">
				<div class="col-sm-12 mb-2">
					<label class="font4" for="username-input">Nome de usuário</label>
    				<input type="text" class="form-control" id="username-input" placeholder="Nome de usuário" name="username">
				</div>

				<div class="col-sm-12 mb-2">
					<label class="font4" for="password-input">Senha</label>
    				<input type="password" class="form-control" id="password-input" placeholder="Senha" name="password">
				</div>

				<div class="col-sm-12 mb-2 text-right">
					<button class="btn btn-primary">Entrar</button>
				</div>

				<?php 
					component('views/components/alerts', $message);
				?>
				
			</form>

		</div>

	</div>

	<?php require __DIR__.'/../layout/scripts.php'; ?>
</body>
</html>