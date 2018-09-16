<?php


use App\Phase6\ServiceProviders\NetworkProvider;

return [
    'services' => [
        NetworkProvider::class => function ()
        {
            return new NetworkProvider();
        }
    ]
];