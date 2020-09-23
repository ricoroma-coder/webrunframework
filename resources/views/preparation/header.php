<?php

use App\User;

$obj = false;
$session = false;

if (hasSession()) {

	$obj = User::find(getSessionValue('obj'));
	$session = true;

}

$messages = [];
if (isset($data->message))
	$messages = $data->message;

?>