<?php
	if (!empty($data)) 
	{
		if (!is_array($data))
		{
			$data = [$data];
		}

		foreach ($data as $value)
		{
			$classCss = "col100 alert alert-danger";
			if ($value->TYPE == "S")
			{
				$classCss = "col100 alert alert-success";
			}
			else if ($value->TYPE == "W")
			{
				$classCss = "col100 alert alert-warning";
			}
?>

			<div class="col-sm-12 messages">
				<div class="<?php echo $classCss; ?>" role="alert">
					<?php echo $value->DESCRIPTION; ?>
				</div>
			</div>

<?php
		}
	}
?>
