<?php

namespace App\Phase9\Facades;

class Network extends Facade
{
    protected static function getClassName()
    {
        return \App\Phase9\Contracts\Network::class;
    }
}