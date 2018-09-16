<?php

namespace App\Phase9\Tests;


class TestObject
{
    public function __call($name, $arguments)
    {
        return call_user_func($this->$name, ...$arguments);
    }
}