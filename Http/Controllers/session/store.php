<?php

$db = new Database();

$email = $_POST['email'];
$password = $_POST['password'];

Session::flash('old', [ 'email' => $email ]);

$errors = [];

if ( !Validator::email($email) ) {
    $errors['email'] = 'Valid Email is required';
}

if ( !Validator::string( $password,  3, 255) ) {
    $errors['password'] = 'Password needs to be at least three characters long';
}

if (! empty($errors)) {
    Session::flash('errors', $errors );

    redirect('/login');
}

$user = $db->query('select * from users where email = ? ', [ $email ])->find(); //dd($user);

if ($user) {
    if ( password_verify( $password, $user['password'] ) ) {

        $_SESSION['user'] = [
            'id' => $user['id'],
            'email' => $user['email'],
            'name' => $user['name']
        ];

        redirect('/videos');
    }
}


$errors['email'] = 'No matching account found for that email address and password.';
$_SESSION['flash']['errors'] = $errors;

redirect('/login');