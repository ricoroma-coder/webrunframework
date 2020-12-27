<!DOCTYPE html>
<html>
<head>
	<?php require __DIR__.'/layout/links.php'; ?>
	<title>Eloquent Project - Home Page</title>
</head>
<body>

	<?php 
		component('views/components/navbar', ['session'=>$session,'object'=>$user]);
	?>

	<div id="content">
		<div class="bg bg-dark"></div>

		<div class="row col60 rounded bg-light h-50 position-relative m-auto">

			<div class="h-100 col-sm-5 p-3">
				<img src="<?php echo asset('images/system-images/avatar/avatar-happy.png'); ?>" class="w-100 mh-100 rounded-circle">
			</div>

			<div class="h-100 col-sm-7 p-3 text-center row m-0">

				<div>
					<p class="font1 font-weight-bold font-staatliches mt-3">Bem-vindo ao index</p>
					<p class="font3 font-balooda2-medium mt-5">Essa é a página inicial de nosso projeto</p>

				</div>

				<?php  
					component('views/components/alerts', $messages);
				?>
				
			</div>
		
		</div>

	</div>


	<?php require __DIR__.'/layout/scripts.php'; ?>
</body>
</html>

