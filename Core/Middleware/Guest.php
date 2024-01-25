<?php

namespace Core\Middleware;

use Core\Session;

class Guest
{
    public function handle()
    {
        if ($_SESSION['user'] ?? false) {
            Session::flash('success' , 'You are already logged in');
            redirect('/');
        }
    }
}