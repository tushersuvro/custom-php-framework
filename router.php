<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path']; //dd($_SERVER);

$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/services' => 'controllers/services.php',
];

routeToController( $uri , $routes );