<?php

namespace Core;

use Exception;

class Container {
    protected $containers = [];

    public function bind( $key, $service  ) {
        $this->containers[$key] = $service;
    }

    public function resolve( $key ) {
        if ( !array_key_exists( $key, $this->containers) ) {
            throw new Exception("No matching service found for $key");
        }

        $service = $this->containers[$key];
        return $service();

//        return call_user_func($service);
    }
}