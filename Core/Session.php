<?php

namespace Core;

defined('APP_PATH') OR exit('No direct script access allowed');

class Session
{
    public static function flash($key, $value)
    {
        $_SESSION['flash'][$key] = $value;
    }

    public static function unflash() {
        unset($_SESSION['flash']);
    }

    public static function get($key , $default = null)
    {
        // checking if flash key is used to show errors
        if( isset($_SESSION['flash'][$key]) ) {
            return $_SESSION['flash'][$key];
        }
        // else return top level session key value
        return $_SESSION[$key] ?? $default;
    }

    public static function old($data, $escape = false)
    {
        if ($escape && isset($_SESSION['flash']['old'][$data])) $_SESSION['flash']['old'][$data] = htmlspecialchars($_SESSION['flash']['old'][$data]);
        return $_SESSION['flash']['old'][$data] ?? '';
    }
}