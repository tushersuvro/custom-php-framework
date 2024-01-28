<?php

use Core\Session;

// each client should remember their session id for EXACTLY 1 year
session_set_cookie_params(365*24*3600);

session_start();

const BASE_PATH = __DIR__.'/../';
const APP_PATH = __DIR__.'/../App/';

require __DIR__ .'/../Core/helper.php';

// automatically loading class when instantiated
spl_autoload_register(function ($class) {
    require  BASE_PATH . $class . '.php';
});

require __DIR__ .'/../bootstrap.php';

require __DIR__ .'/../router.php';

Session::unflash();

