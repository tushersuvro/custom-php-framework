<?php

class Router {

    protected static $routes = [];

    public static function add($method, $uri, $controller)
    {
        self::$routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }

    public static function get($uri, $controller)
    {
        self::add('GET', $uri, $controller);
    }

    public static function post($uri, $controller)
    {
        self::add('POST', $uri, $controller);
    }

    public static function delete($uri, $controller)
    {
        self::add('DELETE', $uri, $controller);
    }

    public static function patch($uri, $controller)
    {
        self::add('PATCH', $uri, $controller);
    }

    public static function put($uri, $controller)
    {
        self::add('PUT', $uri, $controller);
    }

    // iterates over the defined routes and matches the requested URI and HTTP method.
    // If a match is found, it includes the corresponding controller file

    public static function route($uri, $method)
    {
        foreach (self::$routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require BASE_PATH . 'controllers/' .$route['controller'].'.php';
            }
        }

        self::abort();
    }

    protected static function abort($code = 404)
    {
        http_response_code($code);

        require BASE_PATH . "views/{$code}.php";

        die();
    }
}