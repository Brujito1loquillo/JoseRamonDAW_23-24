<?php

class UnspectedRequestMethodException extends JRException {
    public function __construct (String $method) {
        parent::__construct();

        $this->message = "Ha llegado un peticion por el metodo: $method";
    }
}