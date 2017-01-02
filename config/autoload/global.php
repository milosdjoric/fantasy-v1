<?php

return [
   'db' => array(
    'driver' => 'Pdo',
    'dsn' => 'mysql:dbname=fantasy;host=localhost',
    'username' => 'root',
    'password' => '',
    'driver_options' => array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
    ),
),
];
