<?php

namespace App\Phase9\Tests;

use App\Phase9\Controllers\Main;
use App\Phase9\Facades\Network;
use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    public function testGetFirstLineOfPage()
    {
        Network::should('get', function ($url)
        {
            return "<!DOCTYPE html><!--STATUS OK-->\r\nasdfljsalkdjfl;";
        });

        $main = new Main();
        $firstLine = $main->getFirstLineOfPage('https://www.baidu.com');

        self::assertEquals('<!DOCTYPE html><!--STATUS OK-->', $firstLine);
    }
}