<?php

function dd( $value ) {
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    exit;
}

function isCurrentURI( $value ) {
    return $_SERVER['REQUEST_URI'] == $value;
}

function abort( $code = 404) {
    http_response_code($code);
    require BASE_PATH . "views/{$code}.php";
    exit;
}

function routeToController( $uri , $routes ) {
    if( array_key_exists( $uri , $routes) ) {
        require BASE_PATH . $routes[$uri];
    } else {
        abort();
    }
}