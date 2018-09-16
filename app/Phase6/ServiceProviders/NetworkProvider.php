<?php

namespace App\Phase6\ServiceProviders;

use App\Phase6\Core\Container;
use App\Phase6\Services\NetworkService;

class NetworkProvider implements Provider
{

    public function register()
    {
        $container = new Container();
        $container->bind(NetworkService::class, function ()
        {
            return new NetworkService();
        });
    }
}