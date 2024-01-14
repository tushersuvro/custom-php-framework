<?php

view('registration/create' , [
    'errors' => $_SESSION['flash']['errors'] ?? []
]);