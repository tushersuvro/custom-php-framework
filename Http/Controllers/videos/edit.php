<?php

//dd('inside edit');
use Core\Database;
use Core\Session;

$db = new Database();

authorize( isset($_SESSION['user']) , 401 );

if (! isset( $_GET['id'] )) {
    abort();
}

$video = $db->query('select * from videos where id = ? ', [ $_GET['id'] ])->find();

authorize( $video['user_id'] == $_SESSION['user']['id'] );

$errors = Session::get('errors');

view('videos/edit' , compact(  'video' , 'errors' ) );