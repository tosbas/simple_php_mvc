<?php

class Autoloader{

    public static function autoload($class)
    {
        $file = ROOT . "/" . str_replace("\\", "/", $class) . ".php";
    
        if (file_exists($file)) {
            require_once $file;
        } else {
            http_response_code(404);
            echo "La page demandée n'existe pas !";
            exit;
        }
    }
    
    
    public static function register(){
        spl_autoload_register([__CLASS__, "autoload"]);
    }


}