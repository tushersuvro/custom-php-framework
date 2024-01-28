<?php

//dd('inside store');

use Core\App;
use Core\Session;
use App\Http\Forms\FormValidator;

$db = App::resolve('Core\Database');

$title = $_POST['title'];
$description= $_POST['description'];
$embed = $_POST['embed'];

Session::flash( 'old', ['title' => $title , 'description' => $description , 'embed' => $embed ] );

FormValidator::validate([
    'embed' => $embed,
    'description' => $description,
    'title' => $title
]);

// saving video to database
$db->query('INSERT INTO videos( user_id, title, description, embed ) VALUES( ? , ?, ?, ? )',
    [ $_SESSION['user']['id'] , $title, $description, $embed ]
);
Session::flash( 'success', 'Video is saved' );

redirect('/videos');
    
