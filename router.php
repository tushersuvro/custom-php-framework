<?php

$uri = getCurrentURIPath(); //dd($uri);

$routes = [
    '/' => 'home',
    '/about' => 'about',
    '/services' => 'services',

    '/videos' => 'videos/index',
    '/video' => 'videos/show',
    '/videos/create' => 'videos/create',
    '/videos/store' => 'videos/store',
    '/videos/edit' => 'videos/edit',
    '/videos/update' => 'videos/update',
    '/videos/delete' => 'videos/destroy',

    '/register' => 'registration/create',
    '/register/store' => 'registration/store',

    '/dashboard' => 'users/dashboard',

    '/login' => 'session/create',
    '/session/create' => 'session/store',
    '/logout' => 'session/destroy',
];

routeToController( $uri , $routes );