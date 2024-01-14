<?php

view('session/create' , [
    'errors' => $_SESSION['flash']['errors'] ?? []
]);