<?php

use App\General\Database;

error_reporting(E_ALL);
ini_set('display_errors', true);

require __DIR__ . '/vendor/autoload.php';
  
session_start();

new Database();
 
try {
 
    require __DIR__ . '/routes/route-list.php';
 
} catch(\Exception $e){
     
    echo $e->getMessage();
}