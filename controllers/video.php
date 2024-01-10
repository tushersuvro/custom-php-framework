<?php

require BASE_PATH . 'Database.php';

$db = new Database();

$id = $_GET['id'];

$video = $db->query( "select * from videos where id = ?" , [ $id ] )->fetch(); //dd($video);

$header = $video['title']; //dd($welcome);

//dd($videos);

view('video', compact( 'header' , 'video' ) );