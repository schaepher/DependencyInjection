<?php

namespace App\Phase7\Tests;

use App\Phase7\Controllers\Main;
use App\Phase7\Core\Container;
use App\Phase7\Services\NetworkService;
use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    public function testGetFirstLineOfPage()
    {
        $mock = $this->createMock(NetworkService::class);
        $mock->method('get')->willReturn("<!DOCTYPE html><!--STATUS OK-->\r\nasdfljsalkdjfl;");

        $main = new Main();
        $firstLine = $main->getFirstLineOfPage('https://www.baidu.com',$mock);

        self::assertEquals('<!DOCTYPE html><!--STATUS OK-->', $firstLine);
    }
}