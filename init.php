<?php
set_include_path(__DIR__);

//Composer
require_once 'vendor/autoload.php';

//DotEnv
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

//Illuminate\Database
$capsule = new \Illuminate\Database\Capsule\Manager;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'soap',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();

$capsule->bootEloquent();