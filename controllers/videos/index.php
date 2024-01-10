<?php

require BASE_PATH . 'Database.php';

$db = new Database();

$videos = $db->query( "select * from videos" )->fetchAll();

$header = "All Videos"; //dd($welcome);

//dd($videos);

view('videos/index', compact( 'header' , 'videos' ) );

