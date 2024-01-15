<?php

function old( $data , $escape = false ) {
    if( $escape && isset($_SESSION['flash']['old'][$data]) ) $_SESSION['flash']['old'][$data] = htmlspecialchars($_SESSION['flash']['old'][$data]);
    return $_SESSION['flash']['old'][$data] ?? '';
}

function flashed_errors() {
    return $_SESSION['flash']['errors'] ?? [];
}