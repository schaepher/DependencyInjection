<?php

namespace App\Phase1\Controllers;

use App\Phase1\Services\NetworkService;

class Main
{
    public function getFirstLineOfPage($url)
    {
        $client = new NetworkService();
        $responseHtml = $client->get($url);
        $firstLine = substr($responseHtml, 0, strpos($responseHtml, PHP_EOL));

        return $firstLine;
    }
}
