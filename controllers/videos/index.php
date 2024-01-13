<?php

require BASE_PATH . 'Database.php';

$db = new Database();

authorize( isset($_SESSION['user']) , 401 );

$videos = $db->query( "select * from videos where user_id = ?" , [ $_SESSION['user']['id'] ] )->get();

$header = "All Videos"; //dd($welcome);

//dd($videos);

view('videos/index', compact( 'header' , 'videos' ) );

