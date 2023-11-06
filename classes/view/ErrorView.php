<?php

class ErrorView extends View {
    private $exception;

    public function __construct (Exception $e) {
        parent::__construct();

        $this->exception = $e;
        // var_dump($this->exception); die();
        $this->templates["resource"] = "error";
    }

    /*
    private function getException (): Exception {
        return $this->exception;
    }
    */

    public function getExceptionClass (): String {
        // return $this->exception->get_class();
        return get_class($this->exception);
    }

    public function getExceptionMessage (): String {
        return $this->exception->getMessage();
    }
}

?>