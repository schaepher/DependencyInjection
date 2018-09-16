<?php


use App\Phase8\ServiceProviders\NetworkProvider;

return [
    'services' => [
        NetworkProvider::class => function ()
        {
            return new NetworkProvider();
        }
    ]
];