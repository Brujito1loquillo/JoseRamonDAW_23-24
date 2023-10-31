<?php
/* ****** *
 * ERRORS *
 * ****** */
error_reporting(E_ALL);
ini_set("display_errors", 1);

/* ************************ *
 * CARGA DINAMICA DE CLASES *
 * ************************ */
spl_autoload_register(function (String $cName) {
    $cType = "model";

    if (fnmatch("*Controller", $cName)) $cType = "controller";
    else if (fnmatch("*View", $cName)) $cType = "view";

    if (file_exists($cFile = "classes/$cType/$cName.php")) {
        require_once $cFile;
    } else {
        throw new Exception("ClassNotFoundException");
    }

    // var_dump($cFile);
});

/* ********* *
 * CONTENIDO *
 * ********* */
try {
    FrontController::dispatch();
} catch (Exception $e) {
    echo $e->getMessage();
    // $view = new ErrorView($e);
    // $view->show();
}

?>