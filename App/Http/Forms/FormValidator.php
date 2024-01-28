<?php

namespace App\Http\Forms;

use Core\ValidationException;
use Core\Validator;

class FormValidator
{
    private $errors = [];
    public $attributes = [];


    function __construct($attributes) {
        $this->attributes = $attributes;

        $validationRules = [
            'email'       => ['validator' => 'email', 'message' => 'Valid Email is required'],
            'password'    => ['validator' => 'string', 'args' => [3, 255], 'message' => 'Password needs to be at least three characters long'],
            'name'        => ['validator' => 'string', 'args' => [1, 255], 'message' => 'Name is required'],
            'title'       => ['validator' => 'string', 'args' => [1, 255], 'message' => 'Title is required'],
            'description' => ['validator' => 'string', 'args' => [50], 'message' => 'Description needs to be at least 50 characters long'],
            'embed'       => ['validator' => 'isValidEmbed', 'message' => 'Embed needs to be valid'],
        ];

        foreach ($validationRules as $attribute => $rule) {
            if (isset($this->attributes[$attribute])) {
                $isValid = call_user_func_array( [  'Core\Validator', $rule['validator']],
                                                    array_merge([$this->attributes[$attribute]], $rule['args'] ?? [] )
                                                );
                if (!$isValid) {
                    $this->errors[$attribute] = $rule['message'];
                }
            }
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