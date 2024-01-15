<?php

function string($value, $min = 1, $max = INF)
{
    $value = trim($value);

    return strlen($value) >= $min && strlen($value) <= $max;
}

function email($value)
{
    return filter_var($value, FILTER_VALIDATE_EMAIL);
}

function isValidURL($value)
{
    return filter_var($value, FILTER_VALIDATE_URL);
}

function isValidEmbed( $embed )
{
    $pattern = '/<iframe[^>]*><\/iframe>/';
    return preg_match($pattern, $embed) === 1;
}