<?php

//dd('inside store');

$db = new Database();

$title = $_POST['title'];
$description= $_POST['description'];
$embed = $_POST['embed'];

// find the corresponding video
$video = $db->query('select * from videos where id = ?', [ $_POST['id'] ] )->findOrFail();

authorize(isset($_SESSION['user']) && ($video['user_id'] === $_SESSION['user']['id']) );

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
    Session::flash( 'errors' , $errors);

    redirect('/video/edit?id='.$video['id']);
}

$db->query('UPDATE videos set title = ?, description = ? , embed = ? where id = ? and user_id = ?', [
    $_POST['title'], $_POST['description'], $_POST['embed'], $_POST['id'] , $_SESSION['user']['id']
]);

redirect('/video/edit?id='.$video['id']);
    
