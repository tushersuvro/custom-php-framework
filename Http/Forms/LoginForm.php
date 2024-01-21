<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    private $email , $password, $errors;

    function __construct($email , $password ) {
        $this->email = $email;
        $this->password = $password;
    }

    public function validate( )
    {
        $this->errors = [];

        if ( !Validator::email($this->email) ) {
            $this->errors['email'] = 'Valid Email is required';
        }

        if ( !Validator::string( $this->password,  3, 255) ) {
            $this->errors['password'] = 'Password needs to be at least three characters long';
        }

        return empty($this->errors);

    }

    public function errors()
    {
        return $this->errors;
    }

    function addError( $key , $value ) {
        $this->errors[$key] = $value;
    }
}