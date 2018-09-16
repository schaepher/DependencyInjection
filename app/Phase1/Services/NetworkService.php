<?php

namespace App\Phase1\Services;

/**
 * Class NetworkService
 * @package App\Phase1\Services
 * Service 的构造函数通常是默认的，或者参数列表为空、或者参数列表包含其他的类
 */
class NetworkService
{
    public function get($url)
    {
        return file_get_contents($url);
    }
}