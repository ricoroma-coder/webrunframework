<?php
	if (!empty($data)) 
	{

		foreach ($data as $value)
		{
			if ($value->type == "error") 
			{
?>
				<div class="col-sm-12 messages">
					<div class="col100 alert alert-danger" role="alert">
						<?php echo $value->description; ?>
					</div>
				</div>

<?php
			}
			else if ($value->type == "success") 
			{
?>
				<div class="col-sm-12 messages">
					<div class="col100 alert alert-success" role="alert">
						<?php echo $value->description; ?>
					</div>
				</div>

<?php
			}
		}
	}
?>
