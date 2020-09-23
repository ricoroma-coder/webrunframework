<?php

require 'config.php';

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
            'adapter' => $DBDRIVER,
            'host' => $DBHOST,
            'name' => $DBNAME,
            'user' => $DBUSER,
            'pass' => $DBPASS,
            'port' => $DBPORT,
            'charset' => 'utf8',
        ],
        'development' => [
            'adapter' => $DBDRIVER,
            'host' => $DBHOST,
            'name' => $DBNAME,
            'user' => $DBUSER,
            'pass' => $DBPASS,
            'port' => $DBPORT,
            'charset' => 'utf8',
        ],
        'testing' => [
            'adapter' => $DBDRIVER,
            'host' => $DBHOST,
            'name' => $DBNAME,
            'user' => $DBUSER,
            'pass' => $DBPASS,
            'port' => $DBPORT,
            'charset' => 'utf8',
        ]
    ],
    'version_order' => 'creation'
];
