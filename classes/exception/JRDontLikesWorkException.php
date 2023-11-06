<?php

class JRDontLikesWorkException extends JRException {
    public function __construct (String $message) {
        parent::__construct();
        
        $this->message = $message;
    }
}