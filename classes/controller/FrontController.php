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
                if (method_exists($controller, $method)) {
                    $controller::$method();
                } else {
                    throw new MethodNotExistException($controller, $method);
                }
            } else {
                throw new ClassNotFoundException($controller);
            }
        } 
    }
}

?>