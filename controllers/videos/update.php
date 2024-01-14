<?php

//dd('inside store');

require BASE_PATH . 'Database.php';

$db = new Database();

$title = $_POST['title'];
$description= $_POST['description'];
$embed = $_POST['embed'];

// find the corresponding video
$video = $db->query('select * from videos where id = ?', [ $_POST['id'] ] )->findOrFail();

authorize(isset($_SESSION['user']) && ($video['user_id'] === $_SESSION['user']['id']) );

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
    redirect('/videos/edit?id='.$video['id']);
}

$db->query('UPDATE videos set title = ?, description = ? , embed = ? where id = ? and user_id = ?', [
    $_POST['title'], $_POST['description'], $_POST['embed'], $_POST['id'] , $_SESSION['user']['id']
]);

header('location: /video?id='.$_POST['id']);
exit;
    
