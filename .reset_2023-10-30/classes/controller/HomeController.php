<?php

abstract class HomeController extends Controller {
    private function __construct () {}

    public static function show (): void {
        $view = new HomeView();
        $view->show();
    }
}

?>
