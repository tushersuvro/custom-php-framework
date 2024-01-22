<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class FormValidator
{
    private $errors = [];
    public $attributes = [];

    function __construct( $attributes ) {

        $this->attributes = $attributes;

        if ( isset($this->attributes['email']) && !Validator::email( $this->attributes['email'] ) ) {
            $this->errors['email'] = 'Valid Email is required';
        }

        if ( isset($this->attributes['password']) && !Validator::string( $this->attributes['password'],  3, 255) ) {
            $this->errors['password'] = 'Password needs to be at least three characters long';
        }

        if ( isset($this->attributes['name']) && !Validator::string( $this->attributes['name'],  1, 255) ) {
            $this->errors['name'] = 'Name is required';
        }

        if ( isset($this->attributes['title']) &&  !Validator::string(  $this->attributes['title'],  1, 255) ) {
            $this->errors['title'] = 'Title is required';
        }

        if ( isset($this->attributes['description']) && !Validator::string(  $this->attributes['description'],  50) ) {
            $this->errors['description'] = 'Description needs to be at least 50 characters long';
        }

        if ( isset($this->attributes['embed']) && !Validator::isValidEmbed(  $this->attributes['embed']) ) {
            $this->errors['embed'] = 'Embed needs to be valid';
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