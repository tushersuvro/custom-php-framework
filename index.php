<?php

// each client should remember their session id for EXACTLY 1 year
session_set_cookie_params(365*24*3600);

session_start();

const BASE_PATH = __DIR__ .'/';

require BASE_PATH . 'Core/helper.php';

// automatically loading class when instantiated
spl_autoload_register(function ($class) {
    require  BASE_PATH . "Core/" . $class . '.php';
});


require 'router.php';


Session::unflash();

