<?php

namespace App\Phase1\Tests;

use App\Phase1\Controllers\Main;
use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    public function testGetFirstLineOfPage()
    {
        $main = new Main();
        $firstLine = $main->getFirstLineOfPage('https://www.baidu.com');
        self::assertEquals('<!DOCTYPE html><!--STATUS OK-->', $firstLine);
    }
}