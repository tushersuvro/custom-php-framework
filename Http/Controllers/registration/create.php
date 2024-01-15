<?php
//dd($_SESSION);
view('registration/create' , [
    'errors' => Session::get('errors')
]);