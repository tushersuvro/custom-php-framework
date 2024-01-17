<?php

use Core\Session;

view('session/create' , [
    'errors' => Session::get('errors') ,
    'success' => Session::get('success')
]);