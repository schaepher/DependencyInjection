<?php


namespace App\Phase9\ServiceProviders;

use App\Phase9\Contracts\Network;
use App\Phase9\Core\Container;
use App\Phase9\Services\NetworkService;

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