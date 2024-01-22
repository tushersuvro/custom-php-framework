<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    private $errors = [];
    public $attributes = [];

    function __construct( $attributes ) {

        $this->attributes = $attributes;

        if ( !Validator::email( $this->attributes['email'] ) ) {
            $this->errors['email'] = 'Valid Email is required';
        }

        if ( !Validator::string( $this->attributes['password'],  3, 255) ) {
            $this->errors['password'] = 'Password needs to be at least three characters long';
        }
    }

    public static function validate( $attributes )
    {
        $instance = new static($attributes);

        return $instance->hasErrors() ? $instance->throw() : $instance;

    }

    public function throw()
    {
        ValidationException::throw( $this->errors(), $this->attributes );
    }

    public function hasErrors()
    {
        return count($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    function addError( $key , $value ) {
        $this->errors[$key] = $value;
        return $this;
    }
}