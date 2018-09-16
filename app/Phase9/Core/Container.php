<?php

namespace App\Phase9\Core;

use Closure;
use const PROJECT_ROOT;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class Container implements ContainerInterface
{
    private static $service = [];

    public function bind($serviceName, $service)
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
            throw new NotFoundException();
        }

        $obj = null;
        if (static::$service[$id] instanceof Closure)
        {
            $builder = static::$service[$id];
            $obj = $builder();
        }
        else if (is_object(static::$service[$id]))
        {
            $obj = static::$service[$id];
        }

        return $obj;
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