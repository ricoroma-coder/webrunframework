<?php

use App\User;
use App\General\GeneralFunction as Functions;

$data = Functions::checkSessionRedirect();

$user = null;
$session = false;
if (isset($_SESSION['USER'])) 
{
	$user = User::findUser('id', $_SESSION['USER']);
	$session = true;
}

$messages = [];
if (isset($data->MESSAGE))
{
	$messages = $data->MESSAGE;
}

$values = [];
if (isset($data->VALUES))
{
	$values = $data->VALUES;
}
