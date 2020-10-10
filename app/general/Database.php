<?php

namespace App\General;

use Illuminate\Database\Capsule\Manager as Capsule;
 
class Database 
{

    private $DBDRIVER = "mysql";
    private $DBHOST = "localhost";
    private $DBNAME = "webrun";
    private $DBUSER = "root";
    private $DBPASS = "";
    private $DBPORT = 3306;
 
    public function __construct() 
    {
        $capsule = new Capsule;
        $capsule->addConnection([
            "driver" => $this->DBDRIVER,
            "host" => $this->DBHOST,
            "database" => $this->DBNAME,
            "username" => $this->DBUSER,
            "password" => $this->DBPASS,
            "charset" => "utf8",
            "collation" => "utf8_unicode_ci",
            "prefix" => "",
        ]);
        $capsule->setAsGlobal();
        // Setup the Eloquent ORM… 
        $capsule->bootEloquent();
    }
 
}