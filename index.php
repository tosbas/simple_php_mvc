<?php

define("ROOT", $_SERVER["DOCUMENT_ROOT"]);

require_once ROOT . "/config.php";
require_once ROOT . "/Autoloader.php";

Autoloader::register();

$param = explode("/", $_GET["p"]);

if (!empty($param[0])) {

    $controller = ucfirst($param[0]);

    $action = isset($param[1]) ? $param[1] : "index";

    $controllerClass =  "controllers\\$controller";
    $controller = new $controllerClass;

    if (method_exists($controller, $action)) {
        call_user_func_array([$controller, $action], $param);
    } else {
        http_response_code(404);
        echo "La page demandée n'existe pas !";
    }
    
} else {

    $controller = new Controllers\Main;

    $controller->index();
}
