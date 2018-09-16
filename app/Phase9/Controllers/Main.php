<?php

namespace App\Phase9\Controllers;

use App\Phase9\Facades\Network;

class Main
{
    public function getFirstLineOfPage($url)
    {
        $responseHtml = Network::get($url);

        $firstLine = substr($responseHtml, 0, strpos($responseHtml, PHP_EOL));

        return $firstLine;
    }
}
