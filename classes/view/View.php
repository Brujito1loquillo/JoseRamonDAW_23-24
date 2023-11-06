<?php

class View {
    protected $templates;

    public function __construct () {
        /*
        $this->templates[] = "head";
        $this->templates[] = "header";
        */
        
        $this->templates = array(
            "head",
            "header",
            "resource" => "home",
            "end"
        );

        /*
        $this->templates = {
            "head",
            "header",
            "resource" => "home",
            "end"
        }
        */
    }

    public function show () {
        foreach ($this->templates as $template) {
            require_once "templates/$template.php";
        }
    }
}

?>