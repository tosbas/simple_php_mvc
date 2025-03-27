<?php

namespace App;

abstract class Controller
{
    protected string $title;
    protected string $description;

    public function render(string $title, string $description, array $datas = [])
    {
        extract($datas);

        $this->title = $title;
        $this->description = $description;

        ob_start();

        $class_rename = str_replace("controllers\\", "",strtolower(get_class($this)));

        require_once(ROOT . "/views/" .  $class_rename . "/index.php");

        $content = ob_get_clean();

        require_once(ROOT . "/views/layout/default.php");
    }

    public function loadModel(string $model)
    {
        $modelClass =  "Models\\$model";

        $this->$model = new $modelClass;
        
    }
}
