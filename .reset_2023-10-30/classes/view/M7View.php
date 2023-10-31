<?php

class M7View extends ModuleView {
    public function __construct () {
        parent::__construct();

        // $this->tmplts["res"] = "m7";

        $this->practicas[] = "Arrodonir";
        $this->practicas[] = "Mates";
    }

    public function show (String $practica = null): void {
        if (!is_null($practica)) $this->tmplts["res"] = $practica;

        parent::show();
    }
}

?>