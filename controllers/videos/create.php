<?php


authorize( isset($_SESSION['user']) , 401 );

view('videos/create' , [ 'heading' => 'Create Video' , 'errors' => flashed_errors() ] );