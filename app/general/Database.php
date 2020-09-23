<?php

namespace App\General;

use Illuminate\Database\Capsule\Manager as Capsule;
 
class Database {

    private $DBDRIVER;
    private $DBHOST;
    private $DBNAME;
    private $DBUSER;
    private $DBPASS;
    private $DBPORT;
 
    public function __construct() {
        $this->readConfig();
        $capsule = new Capsule;
        $capsule->addConnection([
            'driver' => $this->DBDRIVER,
            'host' => $this->DBHOST,
            'database' => $this->DBNAME,
            'username' => $this->DBUSER,
            'password' => $this->DBPASS,
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);
        $capsule->setAsGlobal();
        // Setup the Eloquent ORM… 
        $capsule->bootEloquent();
    }

    private function readConfig() {
        $config_dir = __DIR__.'/../../.env';
        if (fopen($config_dir, 'r')) {
            $content = file_get_contents($config_dir);
            $start = strpos($content, '#DB-SETTINGS');
            $end = strpos($content, '#END-DB-SETTINGS');
            
            $this->setAttributes(substr($content, $start, $end));
        }
        else {
            die('.env not found');
        }
    }

    private function setAttributes($sql) {
        $aux = explode('$', $sql);
        unset($aux[0]);
        foreach ($aux as $value) {
            $attr = explode('=', $value);
            $val = explode('"', $attr[1]);
            $attribute = $attr[0];
            $setVal = $val[1];
            $this->$attribute = $setVal;
        }
    }
 
}