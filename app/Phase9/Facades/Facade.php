<?php

namespace App\Phase9\Facades;

use App\Phase9\Core\Container;
use App\Phase9\Tests\TestObject;
use RuntimeException;

class Facade
{

    /**
     * @return string
     */
    protected static function getClassName()
    {
        throw new RuntimeException('');
    }

    public static function __callStatic($name, $arguments)
    {
        $object = (new Container())->get(static::getClassName());

        return $object->$name(...$arguments);
    }

    public static function should($method, $callBack)
    {
        $container = new Container();
        if ($container->has(static::getClassName()))
        {
            $mockObject = $container->get(static::getClassName());
        }
        else
        {
            $mockObject = new TestObject();
            $container->bind(static::getClassName(), $mockObject);
        }

        $mockObject->$method = $callBack;
    }
}