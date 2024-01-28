<?php

use Core\Authenticator;
use Core\Session;
use App\Http\Forms\FormValidator;

$email = $_POST['email'];
$password = $_POST['password'];

Session::flash('old', [ 'email' => $email ]);

$form = FormValidator::validate([
    'email' => $email,
    'password' => $password
]);


if( !(new Authenticator)->attempt( $email , $password )) {
    $form->addError('email', 'Email or Password is incorrect')->throw();
}

Session::flash('success', 'Login is successful');
redirect('/videos');