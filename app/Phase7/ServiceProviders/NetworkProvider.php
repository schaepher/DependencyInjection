<?php


namespace App\Phase7\ServiceProviders;

use App\Phase7\Core\Container;
use App\Phase7\Services\NetworkService;

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