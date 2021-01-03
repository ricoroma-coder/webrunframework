<!DOCTYPE html>
<html>
<head>
    <?php 
        require __DIR__ . "/../layout/links.php"; 
        $msg = (array) $messages;
    ?>
	<title>Eloquent Project - Esqueci a senha</title>
</head>
<body>

	<?php
		component('views/components/navbar', ['session'=>$session,'object'=>$user]);
	?>

	<div id="content">
		<div class="bg bg-dark"></div>

		<div class="row m-0 mt-5 pt-5">
			
			<form class="form-group row col-sm-4 m-auto p-4 border border-secondary rounded bg-light" method="POST" action="/recuperar-senha/auth">
                <div class="col-sm-12 mb-2">
					<label class="font4" for="name-input">Nome de usuário</label>
    				<input type="text" class="form-control <?php if (isset($msg['error']->username)) echo 'is-invalid'; ?>" id="username-input" placeholder="Nome de usuário" name="username">
    				<?php 
						if (isset($msg['error']->username))
						{
							component('views/components/invalid_feedback', $msg['error']->username[0]);
						}
					?>
				</div>

				<div class="col-sm-12 mb-2 text-right">
					<button class="btn btn-primary">Enviar</button>
				</div>

                <?php 
                    if (!isset($msg['error']))
                    {
                        component('views/components/alerts', $messages);
                    }
				?>
				
			</form>

		</div>

	</div>

	<?php require __DIR__.'/../layout/scripts.php'; ?>
</body>
</html>