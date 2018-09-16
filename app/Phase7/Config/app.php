<?php


use App\Phase7\ServiceProviders\NetworkProvider;

return [
    'services' => [
        NetworkProvider::class => function ()
        {
            return new NetworkProvider();
        }
    ]
];