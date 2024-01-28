<?php

namespace Core;

defined('APP_PATH') OR exit('No direct script access allowed');

Class Validator
{

    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function isValidURL($value)
    {
        return filter_var($value, FILTER_VALIDATE_URL);
    }

    public static function isValidEmbed($embed)
    {
        $pattern = '/<iframe[^>]*><\/iframe>/';
        return preg_match($pattern, $embed) === 1;
    }

}