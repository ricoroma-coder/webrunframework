<div id="menuNavbar" class="row w-100 border-bottom m-0 bg-light">
	
	<div class="col-sm-8 pt-2">
		<a class="font-lobster font2 menu-link text-dark" href="/">Eloquent Project</a>
	</div>

	<?php 

		if ($data['session']) {

	?>

			<div class="row col-sm-4 text-center">
				
				<div class="row m-0 w-100 h-auto border-left border-right pt-3">
					<div class="col-sm-8">
						<span class="font4 font-abeezee">Bem vindo, <?php echo $data['object']->name; ?></span>
					</div>

					<div class="col-sm-4">
						<a href="/logout" class="btn btn-danger">Sair</a>
					</div>
				</div>

			</div>	

	<?php

		}
		else {

	?>

		<div class="row col-sm-4 text-center">

			<?php 
				if (!routeIs('/cadastrar')) { 
			?>
			
			<div class="col-sm-6 pt-3 border-left">
				<a class="font4 link text-secondary" href="/cadastrar">Registrar</a>
			</div>

			<?php
				}
				if (!routeIs('/login')) { 
			?>

				<div class="col-sm-6 pt-3 border-left border-right">
					<a class="font4 link text-secondary w-100 h-100" href="/login">Login</a>
				</div>

			<?php
				}
				if (!routeIs('/')) {
			?>

				<div class="col-sm-6 pt-3 border-left border-right">
					<a class="font4 link text-secondary w-100 h-100" href="/">Home</a>
				</div>

			<?php  
				}
			?>

		</div>

	<?php 

		}

	?>

</div>