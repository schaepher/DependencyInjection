<?php

namespace App\Phase8\Tests;

use App\Phase8\Contracts\Network;
use App\Phase8\Controllers\Main;
use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    public function testGetFirstLineOfPage()
    {
        $mock = $this->createMock(Network::class);
        $mock->method('get')->willReturn("<!DOCTYPE html><!--STATUS OK-->\r\nasdfljsalkdjfl;");

        $main = new Main();
        $firstLine = $main->getFirstLineOfPage('https://www.baidu.com',$mock);

        self::assertEquals('<!DOCTYPE html><!--STATUS OK-->', $firstLine);
    }
}