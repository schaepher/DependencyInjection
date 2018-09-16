<?php

namespace App\Phase2\Controllers;

use App\Phase2\Services\NetworkService;

class Main
{
    private $networkService;

    public function getFirstLineOfPage($url)
    {
        $client = $this->getNetworkService();
        $responseHtml = $client->get($url);
        $firstLine = substr($responseHtml, 0, strpos($responseHtml, PHP_EOL));

        return $firstLine;
    }

    private function getNetworkService()
    {
        if (!isset($this->networkService))
        {
            $this->networkService = new NetworkService();
        }

        return $this->networkService;
    }

    public function setNetworkService($client)
    {
        $this->networkService = $client;
    }
}
