<?php

namespace App\Phase5\Core;

use const PROJECT_ROOT;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class Container implements ContainerInterface
{
    private static $service = [];

    public function set($serviceName, $service)
    {
        static::$service[$serviceName] = $service;
    }

    /**
     * Finds an entry of the container by its identifier and returns it.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @throws NotFoundExceptionInterface  No entry was found for **this** identifier.
     * @throws ContainerExceptionInterface Error while retrieving the entry.
     *
     * @return mixed Entry.
     */
    public function get($id)
    {
        if (!$this->has($id))
        {
            $app = require_once PROJECT_ROOT . '/Config/app.php';
            if (array_key_exists($id, $app['services']) && isset($app['services'][$id]))
            {
                $factory = $app['services'][$id];
                static::$service[$id] = $factory();
            }
            else
            {
                throw new NotFoundException();
            }
        }

        return static::$service[$id];
    }

    /**
     * Returns true if the container can return an entry for the given identifier.
     * Returns false otherwise.
     *
     * `has($id)` returning true does not mean that `get($id)` will not throw an exception.
     * It does however mean that `get($id)` will not throw a `NotFoundExceptionInterface`.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @return bool
     */
    public function has($id)
    {
        return array_key_exists($id, static::$service) && isset(static::$service[$id]);
    }
}