<?php

return [
    'default' => env('DB_CONNECTION', 'mysql'),

    'connections' => [

        'mysql' => [
            'driver' => 'mysql',
            'host' => app('App\Services\Database\DatabaseService')->getHost(),
            'port' => app('App\Services\Database\DatabaseService')->getPort(),
            'database' => app('App\Services\Database\DatabaseService')->getDatabase(),
            'username' => app('App\Services\Database\DatabaseService')->getUser(),
            'password' => app('App\Services\Database\DatabaseService')->getPassword(),
            'unix_socket' => '',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],
    ]
];
