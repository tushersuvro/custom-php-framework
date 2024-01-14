<?php

//dd('inside store');

require BASE_PATH . 'Database.php';

$db = new Database();

$title = $_POST['title'];
$description= $_POST['description'];
$embed = $_POST['embed'];

// find the corresponding note
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
    view('videos/edit', compact( 'errors', 'video' ) );
    exit;
}

// if user not found then create / save user in database,
$db->query('UPDATE videos set title = ?, description = ? , embed = ? where id = ? and user_id = ?', [
    $_POST['title'], $_POST['description'], $_POST['embed'], $_POST['id'] , $_SESSION['user']['id']
]);

header('location: /video?id='.$_POST['id']);
exit;
    
