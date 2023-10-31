<?php

abstract class FrontController extends Controller {
    private function __construct () {}

    public static function dispatch (): void {
        if (($requestMethod = $_SERVER["REQUEST_METHOD"]) === "GET" && count($_GET) === 0) {
            $controller = "Home";
            $method = "show";
        } else if (count($_GET) > 0) {
            $trimedURI = substr($_SERVER["REQUEST_URI"], 2);

            if (strpos($trimedURI, "&") !== false)
                $trimedURI = substr($trimedURI, 0, strpos($trimedURI, "&"));

            if (strpos($trimedURI, "&") !== false)
                $trimedURI = substr($trimedURI, 0, strpos($trimedURI, "&"));

            if (strpos($trimedURI, "="))
                $trimedURI = substr($trimedURI, 0, strpos($trimedURI, "="));

            if (strpos($trimedURI, "/") !== false) {
                $uriParams = explode("/", $trimedURI);

                $controller = $uriParams[0];
                unset($uriParams[0]);

                $method = $uriParams[1];
                unset($uriParams[1]);
            } else {
                $controller = $trimedURI;
                $method = "show";
            }

        } else {
            throw new Exception ("UnexpectedRequestMethodException");
        }

        if (file_exists($cFile = "classes/controller/{$controller}Controller.php")) {
            if (method_exists("{$controller}Controller", $method)) {
                if (isset($uriParams) && count($uriParams) > 0) "{$controller}Controller"::$method(...$uriParams);
                else "{$controller}Controller"::$method();
                
            } else {
                throw new Exception("UndefinedMethodRequiredException");
            }
        } else {
            throw new Exception("RequiredControllerNotFoundException");
        }
    }
}

?>