<?php

use App\User;
require_once __DIR__ . "/preventCookies.php";

$obj = null;
$session = false;

if (hasSession()) 
{
	$obj = User::find(getSessionValue("obj"));
	$session = true;
}

$message = [];
if (isset($data->message))
	$message = $data->message;
