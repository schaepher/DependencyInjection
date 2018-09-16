<?php

namespace App\Phase4\Tests;

use App\Phase4\Controllers\Main;
use App\Phase4\Core\Container;
use App\Phase4\Services\NetworkService;
use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    public function testGetFirstLineOfPage()
    {
        $mock = $this->createMock(NetworkService::class);
        $mock->method('get')->willReturn("<!DOCTYPE html><!--STATUS OK-->\r\nasdfljsalkdjfl;");

        $main = new Main();

        $container = new Container();
        $container->set(NetworkService::class, $mock);
        $firstLine = $main->getFirstLineOfPage('https://www.baidu.com');

        self::assertEquals('<!DOCTYPE html><!--STATUS OK-->', $firstLine);
    }
}