<?php

class ClassNotFoundException extends JRException {
    public function __construct (String $className) {
        parent::__construct();

        $this->message = "La clase: $className, no ha sido encontrada";
    }
}