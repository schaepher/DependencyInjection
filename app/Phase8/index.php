<?php

use App\Phase8\Core\Container;
use App\Phase8\ServiceProviders\Provider;

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

$class = "App\\Phase8\\Controllers\\" . array_shift($argv);
$method = array_shift($argv);
$params = $argv;

$ref = new ReflectionMethod($class, $method);
$parameters = $ref->getParameters();

$newParams = [];
foreach ($parameters as $key => $parameter)
{
    if (!is_null($parameter->getClass()))
    {
        $newParams[] = (new Container())->get($parameter->getClass()->getName());
    }
    else
    {
        $newParams[] = array_key_exists($key, $params) ? $params[$key] : null;
    }
}

$controller = new $class();
echo $controller->$method(...$newParams);