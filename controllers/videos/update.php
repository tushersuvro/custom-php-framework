<?php

//dd('inside store');

require BASE_PATH . 'Database.php';

$db = new Database();

// if user not found then create / save user in database,
$db->query('UPDATE videos set title = ?, description = ? , embed = ? where id = ? and user_id = ?', [
    $_POST['title'], $_POST['description'], $_POST['embed'], $_POST['id'] , $_SESSION['user']['id']
]);

header('location: /video?id='.$_POST['id']);
exit;
    
