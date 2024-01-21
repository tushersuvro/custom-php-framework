<?php

use Core\App;
use Core\Session;
use Http\Forms\LoginForm;

$db = App::resolve('Core\Database');

$email = $_POST['email'];
$password = $_POST['password'];

Session::flash('old', [ 'email' => $email ]);

$form = new LoginForm( $email , $password );

if( !$form->validate() ) {
    Session::flash('errors', $form->errors() );

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
        Session::flash( 'success', 'Login is successful' );

        redirect('/videos');
    }
}

Session::flash('errors', [ 'email' => 'No matching account found for that email address and password.' ]);

redirect('/login');