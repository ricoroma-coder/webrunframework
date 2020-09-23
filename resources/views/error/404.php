<!DOCTYPE html>
<html>
<head>
	<?php require __DIR__.'/../layout/links.php'; ?>
	<title>404 - Não encontrado</title>
</head>
<body>

	<div id="content">
		<div class="bg bg-dark"></div>

		<div class="row col60 rounded bg-light h-50 position-relative m-auto">

			<div class="h-100 col45 p-3">
				<img src="<?php echo asset('images/system-images/avatar/avatar-confused.png') ?>" class="w-100 h-100 rounded-circle">
			</div>

			<div class="h-100 col55 p-3 text-center row m-0">

				<div>
					<p class="font2 font-weight-bold font-staatliches mt-3" style="text-shadow: gray 0 -2px;"><span style="color:red;">404 -</span> Caminho não existente</p>
					<p class="font4 font-balooda2-medium mt-5">Não foi possível encontrar o caminho "<?php echo $data; ?>"</p>
				</div>
				
			</div>
		
		</div>

	</div>


	<?php require __DIR__.'/../layout/scripts.php'; ?>
</body>
</html>


