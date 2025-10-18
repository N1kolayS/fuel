<?php
require dirname(__DIR__) . '/vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


$dotenv->required([
    'DB_DSN',
    'DB_USERNAME',
    'DB_PASSWORD',

]);


$dotenv->required('YII_DEBUG')->isBoolean();
$dotenv->required('YII_ENV')->allowedValues(['dev', 'prod', 'test']);