<?php


namespace App\Phase8\ServiceProviders;

use App\Phase8\Contracts\Network;
use App\Phase8\Core\Container;
use App\Phase8\Services\NetworkService;

class NetworkProvider implements Provider
{

    public function register()
    {
        $container = new Container();
        $container->bind(Network::class, function ()
        {
            return new NetworkService();
        });
    }
}