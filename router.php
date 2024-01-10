<?php

$uri = getCurrentURIPath(); //dd($uri);

$routes = [
    '/' => 'index',
    '/about' => 'about',
    '/services' => 'services',
    '/videos' => 'videos',
    '/video' => 'video',
    '/register' => 'register',
    '/register/store' => 'register_store',
    '/dashboard' => 'dashboard',
    '/login' => 'login',
    '/session/create' => 'session_store',
    '/logout' => 'session_destroy',
];

routeToController( $uri , $routes );