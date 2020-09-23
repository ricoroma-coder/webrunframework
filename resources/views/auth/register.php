<?php  
	require __DIR__.'/../../preparation/header.php';
?>	
<!DOCTYPE html>
<html>
<head>
	<?php require __DIR__.'/../layout/links.php'; ?>
	<title>Eloquent Project - Cadastro</title>
</head>
<body>

	<?php 
		component('views/components/navbar', ['session'=>$session,'object'=>$obj]);
	?>

	<div id="content">
		<div class="bg bg-dark"></div>
		
		<div class="row m-0 my-5 pt-5">
			
			<form class="form-group row col-sm-6 m-auto p-4 border border-secondary rounded bg-light" method="POST" action="/cadastrar/auth">
				<div class="col-sm-12 mb-2">
					<label class="font4" for="name-input">Nome</label>
    				<input type="text" class="form-control <?php if (isset($messages['error']['name'])) echo 'is-invalid'; ?>" id="name-input" placeholder="Nome" name="name">
    				<?php 
    					if (isset($messages['error']['name']))
    						component('views/components/invalid_feedback', $messages['error']['name'][0]);
					?>
				</div>

                <div class="col-sm-12 mb-2">
					<label class="font4" for="username-input">Nome de usuário</label>
    				<input type="text" class="form-control <?php if (isset($messages['error']['username'])) echo 'is-invalid'; ?>" id="username-input" placeholder="Nome de usuário" name="username">
    				<?php 
    					if (isset($messages['error']['username']))
    						component('views/components/invalid_feedback', $messages['error']['username'][0]);
					?>
				</div>

				<div class="col-sm-12 mb-2">
					<label class="font4" for="password-input">Senha</label>
    				<input type="password" class="form-control <?php if (isset($messages['error']['password'])) echo 'is-invalid'; ?>" id="password-input" placeholder="Senha" name="password">
    				<?php 
    					if (isset($messages['error']['password']))
    						component('views/components/invalid_feedback', $messages['error']['password'][0]);
					?>
				</div>

                <div class="col-sm-12 mb-2">
					<label class="font4" for="email-input">E-mail</label>
    				<input type="text" class="form-control <?php if (isset($messages['error']['email'])) echo 'is-invalid'; ?>" id="email-input" placeholder="E-mail" name="email">
    				<?php 
    					if (isset($messages['error']['email']))
    						component('views/components/invalid_feedback', $messages['error']['email'][0]);
					?>
				</div>

				<div class="col-sm-12 mb-2 text-right">
					<button class="btn btn-primary">Entrar</button>
				</div>

				<?php
					if (isset($messages['error']['conn']))
						component('views/components/alerts', $messages['error']['conn']);
				?>
				
			</form>

		</div>

	</div>

	<?php require __DIR__.'/../layout/scripts.php'; ?>
</body>
</html>