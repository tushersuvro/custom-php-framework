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
    '/dashboard' => 'controllers/dashboard.php',
    '/login' => 'controllers/login.php',
    '/session/create' => 'controllers/session_store.php',
    '/logout' => 'controllers/session_destroy.php',
];

routeToController( $uri , $routes );