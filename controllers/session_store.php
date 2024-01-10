<?php

require BASE_PATH . 'Database.php';

$db = new Database();

$email = $_POST['email'];
$password = $_POST['password'];

$user = $db->query('select * from users where email = ? ', [ $email ])->fetch();

if ($user) {
    if ( $password === $user['password']) {

        $_SESSION['user'] = [
            'email' => $user['email'],
            'name' => $user['name']
        ];

        header('location: /dashboard');
        exit();
    }
}

view('login');