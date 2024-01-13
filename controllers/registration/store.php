<?php

require BASE_PATH . 'Database.php';

$db = new Database();

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$user = $db->query('select * from users where email = ?', [ $email ] )->find();

if ( !$user ) {
    // if user not found then create / save user in database,
    $db->query('INSERT INTO users(name, email, password) VALUES( ?, ?, ?)', [ $name, $email, $password ]);

    // marking a user has logged in
    $_SESSION['user'] = [
        'id' => $db->getLastInsertId(),
        'email' => $email,
        'name' => $name
    ];

    // redirect user
    header('location: /videos');

} else {
    // redirect user
    header('location: /');
}

exit;


