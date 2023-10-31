<?php

class ModuleView extends View {
    protected $practicas;

    public function __construct () {
        parent::__construct();
    
        $this->tmplts["res"] = "module";
    }

    public function show (String $practica = null): void {
        if (!is_null($practica)) $this->tmplts["res"] = $practica;

        parent::show();
    }
}

?>