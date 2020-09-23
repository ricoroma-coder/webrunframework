<?php
	if (!empty($data)) {

		$message = $data->description;

		if (!is_array($message))
			$message = [$message];

		if ($data->type == 'error') {
			foreach ($message as $value) {
?>
				<div class="col-sm-12 messages">
					<div class="col100 alert alert-danger" role="alert">
						<?php echo $value; ?>
					</div>
				</div>
<?php
			}
		}
		else if ($data->type == 'success') {
			foreach ($message as $value) {
?>
				<div class="col-sm-12 messages">
					<div class="col100 alert alert-success" role="alert">
						<?php echo $value; ?>
					</div>
				</div>
<?php
			}
		}
	}

?>