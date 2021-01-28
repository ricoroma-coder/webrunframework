<?php

namespace App\General;

use Illuminate\Database\Capsule\Manager as Capsule;
 
class Database 
{
    private $DB;
 
    public function __construct() 
    {
        $this->DB = parse_ini_file(__DIR__ . "/../../WRFInfo.ini");
        $capsule = new Capsule;
        $capsule->addConnection([
            "driver" => $this->DB['DRIVER'],
            "host" => $this->DB['HOST'],
            "database" => $this->DB['NAME'],
            "username" => $this->DB['USER'],
            "password" => empty($this->DB['PASS']) ? '' : $this->DB['PASS'],
            "charset" => "utf8",
            "collation" => "utf8_unicode_ci",
            "prefix" => "",
        ]);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
 
}