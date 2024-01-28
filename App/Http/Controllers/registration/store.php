<?php

use Core\App;
use Core\Session;
use App\Http\Forms\FormValidator;

$db = App::resolve('Core\Database');

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

Session::flash('old', [ 'name' => $name, 'email' => $email ]);

$form = FormValidator::validate([
    'email' => $email,
    'password' => $password,
    'name' => $name
]);


$user = $db->query('select * from users where email = ?', [ $email ] )->find();

if( $user ) {
    $form->addError('email', 'Email already exists in database')->throw();
}

// if user not found then create / save user in database,
$db->query('INSERT INTO users(name, email, password) VALUES( ?, ?, ?)', [ $name, $email, password_hash($password, PASSWORD_BCRYPT) ]);

// marking a user has logged in
$_SESSION['user'] = [
    'id' => $db->getLastInsertId(),
    'email' => $email,
    'name' => $name
];
Session::flash( 'success', 'Registration is successful' );

// redirect user
redirect('/videos');



