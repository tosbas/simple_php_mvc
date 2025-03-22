<?php

define("ROOT", $_SERVER["DOCUMENT_ROOT"]);

require_once ROOT . "/app/Controller.php";
require_once ROOT . "/app/Model.php";

$param = explode("/", $_GET["p"]);

if (!empty($param[0])) {

    $controller = ucfirst($param[0]);

    $action = isset($param[1]) ? $param[1] : "index";

    if (file_exists(ROOT . "/controllers/$controller.php")) {
        require_once ROOT . "/controllers/$controller.php";
        $controller = new $controller;

        if (method_exists($controller, $action)) {
            call_user_func_array([$controller, $action], $param);
        } else {
            http_response_code(404);
            echo "La page demandée n'existe pas !";
        }
    } else {
        http_response_code(404);
        echo "La page demandée n'existe pas !";
    }
} else {

    require_once ROOT . "/controllers/Main.php";

    $controller = new Main;

    $controller->index();
}
