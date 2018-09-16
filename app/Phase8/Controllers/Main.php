<?php

namespace App\Phase8\Controllers;

use App\Phase8\Contracts\Network;

class Main
{
    public function getFirstLineOfPage($url, Network $client)
    {
        $responseHtml = $client->get($url);
        $firstLine = substr($responseHtml, 0, strpos($responseHtml, PHP_EOL));

        return $firstLine;
    }
}
