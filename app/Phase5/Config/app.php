<?php


use App\Phase5\Services\NetworkService;

return [
    'services' => [
        NetworkService::class => function ()
        {
            return new NetworkService();
        }
    ]
];