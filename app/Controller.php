<?php

namespace App;


abstract class Controller
{
    protected string $title;
    protected string $description;

    public function render(string $file, array $datas = [], string $title, string $description)
    {
        extract($datas);

        $this->title = $title;
        $this->description = $description;

        ob_start();

        require_once(ROOT . "/views/" . strtolower(get_class($this) . "/index.php"));

        $content = ob_get_clean();

        require_once(ROOT . "/views/layout/default.php");
    }

    public function loadModel(string $model)
    {
        require_once ROOT . "/models/$model.php";

        $this->$model = new $model();
    }
}
