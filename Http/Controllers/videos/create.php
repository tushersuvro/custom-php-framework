<?php


use Core\Session;

//authorize( isset($_SESSION['user']) , 401 );

view('videos/create' , [
    'heading' => 'Create Video' ,
    'errors' => Session::get('errors') ,
]);