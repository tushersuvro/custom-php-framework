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