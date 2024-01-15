<?php

$db = new Database();

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

set_old( 'name' , $name );
set_old( 'email' , $email );

$errors = [];

if ( !Validator::string( $name,  1, 255) ) {
    $errors['name'] = 'Name is required';
}

if ( !Validator::email($email) ) {
     $errors['email'] = 'Valid Email is required';
}

if ( !Validator::string( $password,  3, 255) ) {
    $errors['password'] = 'Password needs to be at least three characters long';
}

if (! empty($errors)) {

    $_SESSION['flash']['errors'] = $errors;

    redirect('/register');
}

$user = $db->query('select * from users where email = ?', [ $email ] )->find();

if( $user ) {
    $errors['email'] = 'Email already exists in database.';
    $_SESSION['flash']['errors'] = $errors;

    redirect('/register');
}

// if user not found then create / save user in database,
$db->query('INSERT INTO users(name, email, password) VALUES( ?, ?, ?)', [ $name, $email, password_hash($password, PASSWORD_BCRYPT) ]);

// marking a user has logged in
$_SESSION['user'] = [
    'id' => $db->getLastInsertId(),
    'email' => $email,
    'name' => $name
];

// redirect user
redirect('/videos');

