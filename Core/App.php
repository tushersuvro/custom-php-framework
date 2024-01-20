<?php

namespace Core;

class App
{
    protected static $container;

    public static function set($container)
    {
        static::$container = $container;
    }

    public static function container()
    {
        return static::$container;
    }

    public static function bind($key, $service)
    {
        static::container()->bind($key, $service);
    }

    public static function resolve($key)
    {
        return static::container()->resolve($key);
    }
}