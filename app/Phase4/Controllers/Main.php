<?php

namespace App\Phase4\Controllers;

use App\Phase4\Services\NetworkService;
use App\Phase4\Core\Container;

class Main
{
    public function getFirstLineOfPage($url)
    {
        /**
         * @var NetworkService $client
         */
        $client = (new Container())->get(NetworkService::class);
        $responseHtml = $client->get($url);
        $firstLine = substr($responseHtml, 0, strpos($responseHtml, PHP_EOL));

        return $firstLine;
    }
}
