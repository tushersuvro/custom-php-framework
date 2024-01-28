<?php

use Core\Session;

// each client should remember their session id for EXACTLY 1 year
session_set_cookie_params(365*24*3600);

session_start();

const BASE_PATH = __DIR__ .'/App/';

require 'Core/helper.php';

// automatically loading class when instantiated
spl_autoload_register(function ($class) {
    //dd($class);
    //$class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
//    echo $class.'<br>';
    require  $class . '.php';
});

require 'bootstrap.php';

require 'router.php';

Session::unflash();

