<?php

require 'app/general/Database.php';

$db = parse_ini_file("WRFInfo.ini");

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
            'adapter' => $db['DRIVER'],
            'host' => $db['HOST'],
            'name' => $db['NAME'],
            'user' => $db['USER'],
            'pass' => empty($db['PASS']) ? '' : $db['PASS'],
            'port' => $db['PORT'],
            'charset' => 'utf8',
        ],
        'development' => [
            'adapter' => $db['DRIVER'],
            'host' => $db['HOST'],
            'name' => $db['NAME'],
            'user' => $db['USER'],
            'pass' => empty($db['PASS']) ? '' : $db['PASS'],
            'port' => $db['PORT'],
            'charset' => 'utf8',
        ],
        'testing' => [
            'adapter' => $db['DRIVER'],
            'host' => $db['HOST'],
            'name' => $db['NAME'],
            'user' => $db['USER'],
            'pass' => empty($db['PASS']) ? '' : $db['PASS'],
            'port' => $db['PORT'],
            'charset' => 'utf8',
        ]
    ],
    'version_order' => 'creation'
];
