<?php

namespace App\Phase5\Tests;

use App\Phase5\Controllers\Main;
use App\Phase5\Core\Container;
use App\Phase5\Services\NetworkService;
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