<?php

//dd('inside store');

$db = new Database();

$title = $_POST['title'];
$description= $_POST['description'];
$embed = $_POST['embed'];

set_old( 'title' , $title );
set_old( 'description' , $description );
set_old( 'embed' , $embed );


$errors = [];

if ( !string( $title,  1, 255) ) {
    $errors['title'] = 'Title is required';
}

if ( !string( $description,  50, 255) ) {
    $errors['description'] = 'Description needs to be at least 50 characters long';
}

if ( !isValidEmbed( $embed) ) {
    $errors['embed'] = 'Embed needs to be valid';
}

if (! empty($errors)) {
    $_SESSION['flash']['errors'] = $errors;
    redirect('/videos/create');
}

// saving video to database
$db->query('INSERT INTO videos( user_id, title, description, embed ) VALUES( ? , ?, ?, ? )',
    [ $_SESSION['user']['id'] , $title, $description, $embed ]
);

redirect('/videos');
    
