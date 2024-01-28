<?php

//dd('inside store');

use Core\App;
use Core\Session;
use App\Http\Forms\FormValidator;

$db = App::resolve('Core\Database');

$title = $_POST['title'];
$description= $_POST['description'];
$embed = $_POST['embed'];

// find the corresponding video
$video = $db->query('select * from videos where id = ?', [ $_POST['id'] ] )->findOrFail();

//authorize(isset($_SESSION['user']) && ( (int)$video['user_id'] === (int)$_SESSION['user']['id']) );
authorize(( (int)$video['user_id'] === (int)$_SESSION['user']['id']) );

FormValidator::validate([
    'embed' => $embed,
    'description' => $description,
    'title' => $title
]);

$db->query('UPDATE videos set title = ?, description = ? , embed = ? where id = ? and user_id = ?', [
    $_POST['title'], $_POST['description'], $_POST['embed'], $_POST['id'] , $_SESSION['user']['id']
]);
Session::flash( 'success', 'Video is edited' );

redirect('/video/edit?id='.$video['id']);

