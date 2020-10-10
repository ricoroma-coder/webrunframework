<?php

require __DIR__ . "/../bootstrap.php";

$data = [];
$files = [];

if (hasCookieData())
	$data = cookieGetData();

if (hasCookieFiles())
	$files = cookieGetFiles();
 
resolve('', $data, $files);
