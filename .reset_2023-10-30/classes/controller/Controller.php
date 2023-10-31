<?php

abstract class Controller {
    private function __construct () {}

    public static function arrodonir(float $num, int $decimals): float {
        $num = pow($num, $decimals);
        echo $num;
    }
}

?>