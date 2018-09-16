<?php

namespace App\Phase3\Tests;

use App\Phase3\Controllers\Main;
use App\Phase3\Services\NetworkService;
use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    public function testGetFirstLineOfPage()
    {
        $mock = $this->createMock(NetworkService::class);
        $mock->method('get')->willReturn("<!DOCTYPE html><!--STATUS OK-->\r\nasdfljsalkdjfl;");

        $main = new Main();
        $main->setService(NetworkService::class, $mock);
        $firstLine = $main->getFirstLineOfPage('https://www.baidu.com');

        self::assertEquals('<!DOCTYPE html><!--STATUS OK-->', $firstLine);
    }
}