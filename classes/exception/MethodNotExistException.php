<?php

class MethodNotExistException extends JRException {
    public function __construct (String $class, String $method) {
        parent::__construct();

        $this->message = "El metodo, $method, no existe para la clase $class";
    }
}