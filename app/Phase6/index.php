<?php

use App\Phase6\ServiceProviders\Provider;

require __DIR__ . '/../../vendor/autoload.php';

define('PROJECT_ROOT', __DIR__);

$appConfig = require_once PROJECT_ROOT . '/Config/app.php';
$services = $appConfig['services'];

foreach ($services as $service)
{
    /**
     * @var Provider $serviceObj
     */
    $serviceObj = $service();
    $serviceObj->register();
}

array_shift($argv);

$class = "App\\Phase6\\Controllers\\" . array_shift($argv);
$method = array_shift($argv);
$params = $argv;

$controller = new $class();
echo $controller->$method(...$params);