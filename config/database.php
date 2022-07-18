<?php

return [

    'default' => 'mysql',

    'connections' => [
        'brewery' => [
            'driver'    => 'mysql',
            'host'      => '127.0.0.1',
            'port'      => 3306,
            'database'  => 'brewery_db',
            'username'  => 'root',
            'password'  => '123456',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]
    ],
];
