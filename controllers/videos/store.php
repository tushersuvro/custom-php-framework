<?php

//dd('inside store');

require BASE_PATH . 'Database.php';

$db = new Database();

$title = $_POST['title'];
$description= $_POST['description'];
$embed = $_POST['embed'];

// if user not found then create / save user in database,
$db->query('INSERT INTO videos( user_id, title, description, embed ) VALUES( ? , ?, ?, ? )',
    [ $_SESSION['user']['id'] , $title, $description, $embed ]
);

header('location: /videos');
exit;
    
