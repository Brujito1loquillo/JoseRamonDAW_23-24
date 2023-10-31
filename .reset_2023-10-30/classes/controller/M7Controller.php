<?php

abstract class M7Controller extends Controller {
    private function __construct () {}

    public static function show (String $practica = null): void {
        $view = new M7View();
        
        if (is_null($practica)) $view->show();
        else $view->show($practica);
    }
}

?>