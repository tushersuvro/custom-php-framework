<?php

use Core\Session;

// each client should remember their session id for EXACTLY 1 year
session_set_cookie_params(365*24*3600);

session_start();

const BASE_PATH = __DIR__.'/../App/';

require __DIR__ .'/../Core/helper.php';

// automatically loading class when instantiated
spl_autoload_register(function ($class) {
    $projectRoot = __DIR__;

    // remove public string at the end from the varialbe $projectRoot
    $projectRoot = substr($projectRoot, 0, strpos($projectRoot, 'public'));

    require  $projectRoot . $class . '.php';
});

require __DIR__ .'/../bootstrap.php';

require __DIR__ .'/../router.php';

Session::unflash();

