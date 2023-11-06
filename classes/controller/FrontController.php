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
                        // throw new JRDontLikesWorkException("Trabaja en FrontController::dispatch() para GET con parametros");
                        // echo $_SERVER["REQUEST_URI"];
                        $uri = substr($_SERVER["REQUEST_URI"], 2);
                        // echo $uri;
                        $uriParts = explode("/", $uri);
                        // var_dump($uriParts);

                        if (count($uriParts) >= 2) {
                            $controller = ucfirst($uriParts[0]) . "Controller";
                            unset($uriParts[0]);

                            $method = $uriParts[1];
                            unset($uriParts[1]);
                        }

                        if (count($uriParts) === 0) unset($uriParts);
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
                    if (isset($uriParts) && count($uriParts) > 0) {
                        $controller::$method(...$uriParts);
                    } else {
                        $controller::$method();
                    }
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