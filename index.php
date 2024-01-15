<?php

// each client should remember their session id for EXACTLY 1 year
session_set_cookie_params(365*24*3600);

session_start();

const BASE_PATH = __DIR__ .'/';
define("WEB_ROOT", "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['SERVER_NAME']}/");

require 'helper.php';
require 'Validator.php';
require 'Session.php';

// dd($_SERVER);
//
require BASE_PATH . 'Core/Router.php';
require 'router.php';



unset($_SESSION['flash']);

