<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

Session::flash('old', [ 'email' => $email ]);

$form = new LoginForm( $email , $password );

if( $form->validate() ) {

    $auth = new Authenticator;

    if( $auth->attempt( $email , $password )) {
        Session::flash('success', 'Login is successful');
        redirect('/videos');
    }

    $form->addError('email', 'Email or Password is incorrect');
}

Session::flash('errors', $form->errors() );
redirect('/login');