<?php

$uri = getCurrentURIPath(); //dd($uri);

$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/services' => 'controllers/services.php',
    '/videos' => 'controllers/videos.php',
    '/video' => 'controllers/video.php',
    '/register' => 'controllers/register.php',
    '/register/store' => 'controllers/register_store.php',
];

routeToController( $uri , $routes );