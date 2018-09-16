<?php

namespace App\Phase6\Tests;

use App\Phase6\Controllers\Main;
use App\Phase6\Core\Container;
use App\Phase6\Services\NetworkService;
use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    public function testGetFirstLineOfPage()
    {
        $mock = $this->createMock(NetworkService::class);
        $mock->method('get')->willReturn("<!DOCTYPE html><!--STATUS OK-->\r\nasdfljsalkdjfl;");

        $container = new Container();
        $container->bind(NetworkService::class, $mock);

        $main = new Main();
        $firstLine = $main->getFirstLineOfPage('https://www.baidu.com');

        self::assertEquals('<!DOCTYPE html><!--STATUS OK-->', $firstLine);
    }
}