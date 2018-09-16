<?php

require __DIR__ . '/../../vendor/autoload.php';

define('PROJECT_ROOT', __DIR__);

array_shift($argv);

$class = "App\\Phase5\\Controllers\\" . array_shift($argv);
$method = array_shift($argv);
$params = $argv;

$controller = new $class();
echo $controller->$method(...$params);