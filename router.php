<?php

//define function along with a check for a specific constant in PHP files

use Core\Router;
use Core\Session;
use Core\ValidationException;

defined('BASE_PATH') OR exit('No direct script access allowed');

$uri = getCurrentURIPath(); //dd($uri);

Router::get('/', 'home');
Router::get('/about', 'about');
Router::get('/services', 'services');

Router::get('/dashboard', 'users/dashboard');

Router::get('/videos', 'videos/index');
Router::get('/video', 'videos/show');
Router::delete('/video', 'videos/destroy');

Router::get('/videos/create', 'videos/create');
Router::post('/videos/store', 'videos/store');

Router::get('/video/edit', 'videos/edit');
Router::patch('/video', 'videos/update');

Router::get('/register', 'registration/create');
Router::post('/register', 'registration/store');

Router::get('/login', 'session/create');
Router::post('/login', 'session/store');

Router::delete('/logout', 'session/destroy');



try {
    $method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'] ;
//    dd($method);
    Router::route( $uri , $method );
} catch (ValidationException $exception) {
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);

    redirect(Router::previousUrl());
}