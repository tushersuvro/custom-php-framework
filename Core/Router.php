<?php

namespace Core;

use Core\Middleware\Middleware;

defined('APP_PATH') OR exit('No direct script access allowed');

class Router {

    protected static $routes = [];
    protected static $middleware;


    public static function add($method, $uri, $controller )
    {
        self::$routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => self::$middleware
        ];
    }

    public static function get($uri, $controller)
    {
        self::add('GET', $uri, $controller );
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

    public static function handle($uri, $method)
    {   //dd($this->getRoutes());
        // how can I get the attributes routes value from this class

        foreach (self::$routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

                Middleware::resolve($route['middleware']);

                return require APP_PATH . 'Http/Controllers/' .$route['controller'].'.php';
            }
        }

        self::abort();
    }

    public static function group($middleware, $callback)
    {
        $previousMiddleware = self::$middleware; // Saving the current middleware
        self::$middleware = $middleware['middleware']; // Setting the new middleware for the group

        $callback(); // executing callback

        // Restoring the previous middleware after executing the callback
        self::$middleware = $previousMiddleware;
    }

    public static function abort($code = 404)
    {
        http_response_code($code);

        require APP_PATH . "Views/{$code}.php";

        die();
    }

    public static function previousUrl()
    {
        return $_SERVER['HTTP_REFERER'];
    }
}


