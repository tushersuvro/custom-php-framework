<?php

// following contexts are checked
// 1. if non-existent video is browsed
// 2. if user tries to browse other user's video
// 3. if user tries to browse the page omitting qyery string
// 4. if user is not logged in then page browsing is not allowed

use Core\App;

$db = App::resolve('Core\Database');

//authorize( isset($_SESSION['user']) , 401 );

if (! isset( $_GET['id'] )) {
    abort();
}
$id = $_GET['id'];

$video = $db->query( "select * from videos where id = ?" , [ $id ] )->findOrFail(); //dd($video);

$header = $video['title']; //dd($welcome);

//dd($videos);
authorize( $video['user_id'] == $_SESSION['user']['id'] );

view('videos/show', compact( 'header' , 'video' ) );