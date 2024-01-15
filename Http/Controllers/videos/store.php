<?php

//dd('inside store');

use Core\Database;
use Core\Session;
use Core\Validator;

$db = new Database();

$title = $_POST['title'];
$description= $_POST['description'];
$embed = $_POST['embed'];

Session::flash( 'old', ['title' => $title , 'description' => $description , 'embed' => $embed ] );

$errors = [];

if ( !Validator::string( $title,  1, 255) ) {
    $errors['title'] = 'Title is required';
}

if ( !Validator::string( $description,  50, 255) ) {
    $errors['description'] = 'Description needs to be at least 50 characters long';
}

if ( !Validator::isValidEmbed( $embed) ) {
    $errors['embed'] = 'Embed needs to be valid';
}

if (! empty($errors)) {
    Session::flash( 'errors', $errors );

    redirect('/videos/create');
}

// saving video to database
$db->query('INSERT INTO videos( user_id, title, description, embed ) VALUES( ? , ?, ?, ? )',
    [ $_SESSION['user']['id'] , $title, $description, $embed ]
);

redirect('/videos');
    
