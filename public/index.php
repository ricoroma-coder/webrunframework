<?php

require __DIR__ . "/../bootstrap.php";

$data = [];
$files = [];

if (hasCookieData())
{
	$data = cookieGetData();
	unset($_COOKIE['_DATA']);
}

if (hasCookieFiles())
{
	$files = cookieGetFiles();
	unset($_COOKIE['_FILES']);
}
 
resolve('', $data, $files);
