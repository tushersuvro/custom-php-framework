<?php

//dd('inside edit');
require BASE_PATH . 'Database.php';

$db = new Database();

authorize( isset($_SESSION['user']) , 401 );

if (! isset( $_GET['id'] )) {
    abort();
}

$video = $db->query('select * from videos where id = ? ', [ $_GET['id'] ])->find();

authorize( $video['user_id'] == $_SESSION['user']['id'] );

view('videos/edit' , compact(  'video' ) );