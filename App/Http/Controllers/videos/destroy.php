<?php


use Core\App;
use Core\Session;

$db = App::resolve('Core\Database');

$video = $db->query('select * from videos where id = ?', [ $_POST['id'] ] )->findOrFail();

//authorize( isset($_SESSION['user']) && ( $video['user_id'] == $_SESSION['user']['id'] )  );
authorize( ( $video['user_id'] == $_SESSION['user']['id'] )  );

//dd($video);

$db->query('delete from videos where id = ?', [ $video['id'] ]);

Session::flash( 'success', 'Video is deleted' );
redirect('/videos');