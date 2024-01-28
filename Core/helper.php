<?php

defined('APP_PATH') OR exit('No direct script access allowed');

function dd( $value ) {
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    exit;
}

function getCurrentURIPath() {
    return parse_url($_SERVER['REQUEST_URI'])['path'];
}

function isCurrentURI( $values ) {
    return in_array( getCurrentURIPath() , $values );
}

function abort( $code = 404) {
    http_response_code($code);
    require APP_PATH . "views/{$code}.php";
    exit;
}

function view( $file, $variables = [] ) {
    extract($variables );
    require APP_PATH . 'views/' .$file.'.view.php';
}

function authorize( $condition , $code = 403 ) {
    if (! $condition) {
        abort( $code );
    }
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}