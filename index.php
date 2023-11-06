<?php

ini_set("display_errors", 1);

spl_autoload_register(function (String $className) {
    $classType = "model";

    if (fnmatch("*Controller", $className)) $classType = "controller";
    else if (fnmatch("*View", $className)) $classType = "view";
    else if (fnmatch("*Exception", $className)) $classType = "exception";

    if (file_exists(($file = "classes/$classType/$className.php"))) {
        // echo $file;
        require_once $file;
    } else {
        // echo "$file <br />"; // die();
        throw new ClassNotFoundException($className);
    }
});

try {
    FrontController::dispatch();
} catch (Exception $e) {
    // var_dump($e); die();
    $view = new ErrorView($e);
    $view->show();
}

?>
