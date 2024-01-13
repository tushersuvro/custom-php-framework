<?php

require BASE_PATH . 'Database.php';

$db = new Database();

$email = $_POST['email'];
$password = $_POST['password'];

$user = $db->query('select * from users where email = ? ', [ $email ])->find();

if ($user) {
    if ( $password === $user['password']) {

        $_SESSION['user'] = [
            'id' => $user['id'],
            'email' => $user['email'],
            'name' => $user['name']
        ];

        header('location: /videos');
        exit();
    }
}

view('session/create');