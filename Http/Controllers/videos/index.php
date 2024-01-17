<?php

use Core\Database;
use Core\Session;

$db = new Database();

authorize( isset($_SESSION['user']) , 401 );

$videos = $db->query( "select * from videos where user_id = ? order by id desc" , [ $_SESSION['user']['id'] ] )->get();

$header = "All Videos"; //dd($welcome);

//dd($videos);
$success = Session::get('success');

view('videos/index', compact( 'header' , 'videos' , 'success' ) );

