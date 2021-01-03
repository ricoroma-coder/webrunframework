<?php

namespace App\General;

use Illuminate\Database\Capsule\Manager as Capsule;
 
class Database 
{
    private $DRIVER;
    private $HOST;
    private $NAME;
    private $USER;
    private $PASS;
    private $PORT;
 
    public function __construct() 
    {
        $db = parse_ini_file(__DIR__ . "/../../WRFInfo.ini");
        foreach ($db as $key => $attribute)
        {
            $this->$key = $attribute;
        }
        $capsule = new Capsule;
        $capsule->addConnection([
            "driver" => $this->DRIVER,
            "host" => $this->HOST,
            "database" => $this->NAME,
            "username" => $this->USER,
            "password" => empty($this->PASS) ? '' : $this->PASS,
            "charset" => "utf8",
            "collation" => "utf8_unicode_ci",
            "prefix" => "",
        ]);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
 
}