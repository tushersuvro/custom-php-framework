<?php


use Core\Session;

$header = "Welcome to Video Sharing Site"; //dd($welcome);

$success = Session::get('success');

//dd($videos);
view('home', compact( 'header' , 'success' ));