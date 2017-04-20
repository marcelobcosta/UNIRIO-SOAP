<?php
set_include_path(__DIR__);

//Composer
require_once 'vendor/autoload.php';

//DotEnv
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load(true);

//Illuminate\Database
$capsule = new \Illuminate\Database\Capsule\Manager;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => getenv('DB_HOST'),
    'database'  => getenv('DB_DATABASE'),
    'username'  => getenv('DB_USERNAME'),
    'password'  => getenv('DB_PASSWORD'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();

$capsule->bootEloquent();

function env($key, $default = null)
{
    $value = getenv($key);
    if ($value === false) {
        return value($default);
    }
    switch (strtolower($value)) {
        case 'true':
        case '(true)':
            return true;
        case 'false':
        case '(false)':
            return false;
        case 'empty':
        case '(empty)':
            return '';
        case 'null':
        case '(null)':
            return;
    }
//    if (Str::startsWith($value, '"') && Str::endsWith($value, '"')) {
//        return substr($value, 1, -1);
//    }
    return $value;
}