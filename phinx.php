<?php

require 'app/general/Database.php';

$db = new Database();

return
[
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/database/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/database/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => 'development',
        'production' => [
            'adapter' => $db->DBDRIVER,
            'host' => $db->DBHOST,
            'name' => $db->DBNAME,
            'user' => $db->DBUSER,
            'pass' => $db->DBPASS,
            'port' => $db->DBPORT,
            'charset' => 'utf8',
        ],
        'development' => [
            'adapter' => $db->DBDRIVER,
            'host' => $db->DBHOST,
            'name' => $db->DBNAME,
            'user' => $db->DBUSER,
            'pass' => $db->DBPASS,
            'port' => $db->DBPORT,
            'charset' => 'utf8',
        ],
        'testing' => [
            'adapter' => $db->DBDRIVER,
            'host' => $db->DBHOST,
            'name' => $db->DBNAME,
            'user' => $db->DBUSER,
            'pass' => $db->DBPASS,
            'port' => $db->DBPORT,
            'charset' => 'utf8',
        ]
    ],
    'version_order' => 'creation'
];
