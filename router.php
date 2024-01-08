<?php

$uri = getCurrentURIPath(); //dd($uri);

$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/services' => 'controllers/services.php',
    '/videos' => 'controllers/videos.php',
    '/video' => 'controllers/video.php',
];

routeToController( $uri , $routes );