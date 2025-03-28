<?php

namespace App;

abstract class Controller
{
    public function render(string $title, string $description, array $datas = [], array $scriptsJs = [], array $filesCss = [])
    {
        extract($datas);

        $pageTitle = $title;
        $pageDesc = $description;
        $pageScripts = $this->loadScripts($scriptsJs);
        $pageCssFiles = $this->loadCss($filesCss);

        ob_start();

        $class_rename = str_replace("controllers\\", "", strtolower(get_class($this)));

        require_once(ROOT . "/views/" .  $class_rename . "/index.php");

        $content = ob_get_clean();

        require_once(ROOT . "/views/layout/default.php");
    }

    public function loadModel(string $model)
    {
        $modelClass =  "Models\\$model";

        $this->$model = new $modelClass;
    }

    public function loadScripts(array $scriptsJs)
    {

        $autorized_types = ["async", "defer"];

        $scripts = "";

        foreach ($scriptsJs as $type => $scriptsArray) {

            $type = (!in_array($type, $autorized_types)) ? "" : $type;

            foreach ($scriptsArray as $script) {

                if (ENV == "dev") {
                    $script .= "?" . uniqid();
                }

                $scripts .= "<script $type src='/public/js/$script'></script>";
            }
        }

        return $scripts;
    }

    public function loadCss(array $filesCss)
    {

        $files = "";

        foreach ($filesCss as $file) {

            if (ENV == "dev") {
                $file .= "?" . uniqid();
            }

            $files .= "<link href='/public/css/$file' rel='stylesheet'/> ";
        }

        return $files;
    }
}
