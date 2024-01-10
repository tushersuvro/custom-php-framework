<?php

$uri = getCurrentURIPath(); //dd($uri);

$routes = [
    '/' => 'index',
    '/about' => 'about',
    '/services' => 'services',
    '/videos' => 'videos/index',
    '/video' => 'videos/show',
    '/register' => 'registration/create',
    '/register/store' => 'registration/store',
    '/dashboard' => 'users/dashboard',
    '/login' => 'session/create',
    '/session/create' => 'session/store',
    '/logout' => 'session/destroy',
];

routeToController( $uri , $routes );