<?php

namespace App\Phase7\Controllers;

use App\Phase7\Services\NetworkService;

class Main
{
    public function getFirstLineOfPage($url, NetworkService $client)
    {
        $responseHtml = $client->get($url);
        $firstLine = substr($responseHtml, 0, strpos($responseHtml, PHP_EOL));

        return $firstLine;
    }
}
