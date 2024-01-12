<?php

//dd('inside edit');
require BASE_PATH . 'Database.php';

$db = new Database();

$video = $db->query('select * from videos where id = ? ', [ $_GET['id'] ])->fetch();

$heading = 'Edit Video';

view('videos/edit' , compact( 'heading' , 'video' ) );