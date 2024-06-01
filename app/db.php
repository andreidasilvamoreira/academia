<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();
$capsule->addConnection([
    'driver'    => env('DB_DRIVER', 'mysql'),
    'port'      => env('DB_PORT', 3306),
    'host'      => env('DB_HOST', 'localhost'),
    'database'  => env('DB_DATABASE', 'academia'),
    'username'  => env('DB_USERNAME', 'root'),
    'password'  => env('DB_PASSWORD', 'admin'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
]);
$capsule->bootEloquent();

