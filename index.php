<?php

const BASE_PATH = __DIR__ .'/';
define("WEB_ROOT", "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['SERVER_NAME']}/");

require 'helper.php';

require 'router.php';

// dd($_SERVER);

