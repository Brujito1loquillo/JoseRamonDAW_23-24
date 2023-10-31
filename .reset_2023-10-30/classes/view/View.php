<?php

class View {
    protected $tmplts;
    protected $menu;
    protected $styles;

    public function __construct () {
        $this->tmplts = [
            "head",
            "header",
            "res" => "home",
            "end"
        ];
        
        $this->menu = [
            "M7",
            "PRGS"
        ];

        $this->styles = [
            "reset",
            "main"
        ];
    }

    public function show (): void {
        foreach ($this->tmplts as $tmplt) require_once "tmplts/$tmplt.php";
    }
}

?>