<?php

//dd('inside store');

require BASE_PATH . 'Database.php';

$db = new Database();

$_SESSION['flash']['old']['title'] = $title = $_POST['title'];
$_SESSION['flash']['old']['description'] = $description= $_POST['description'];
$_SESSION['flash']['old']['embed'] = $embed = $_POST['embed'];

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
    
