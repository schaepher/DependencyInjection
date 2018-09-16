<?php

namespace App\Phase3\Controllers;

use App\Phase3\Services\NetworkService;

class Main
{
    private $service = [];

    public function getFirstLineOfPage($url)
    {
        /**
         * @var NetworkService $client
         */
        $client = $this->getService(NetworkService::class);
        $responseHtml = $client->get($url);
        $firstLine = substr($responseHtml, 0, strpos($responseHtml, PHP_EOL));

        return $firstLine;
    }

    private function getService($serviceName)
    {
        if (!array_key_exists($serviceName, $this->service) || !isset($this->service[$serviceName]))
        {
            $this->service[$serviceName] = new $serviceName();
        }

        return $this->service[$serviceName];
    }

    public function setService($serviceName, $service)
    {
        $this->service[$serviceName] = $service;
    }
}
