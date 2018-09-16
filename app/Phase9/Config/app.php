<?php


use App\Phase9\ServiceProviders\NetworkProvider;

return [
    'services' => [
        NetworkProvider::class => function ()
        {
            return new NetworkProvider();
        }
    ]
];