<?php

abstract class ModuleController extends Controller {
    private function __construct() {}

    public static function show (String $module): void {
        $view = new ModuleView($module);

        $view->show();
    }
}