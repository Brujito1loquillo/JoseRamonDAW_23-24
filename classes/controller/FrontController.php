<?php

abstract class FrontController extends Controller {
    private function __construct() {}

    public static function dispatch () {
        switch ($_SERVER["REQUEST_METHOD"]) {
            case "GET":
                    // echo "Ha llegado un GET";
                    if (count($_GET) === 0) {
                        $controller = "HomeController";
                        $method = "show";
                    } else {
                        throw new JRDontLikesWorkException("Trabaja en FrontController::dispatch() para GET con parametros");
                    }
                break;
            case "POST":
                break;
            default:
                throw new UnspectedRequestMethodException($_SERVER["REQUEST_METHOD"]);
        }

        if (isset($controller) && isset($method)) {
            if (file_exists("classes/controller/$controller.php")) {
                if (method_exists($method, $controller)) {
                    $controller::$method();
                } else {
                    throw new JRDontLikesWorkException("Hacer una excepcion para cuando llega por cabezera un metodo que no existe");    
                }
            } else {
                throw new ClassNotFoundException($controller);
            }
        } 
    }
}

?>