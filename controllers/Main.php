<?php

namespace Controllers;

use App\Controller;

class Main extends Controller
{
    /**
     * @var MyModel
     */
    protected $MyModel;

    public function index()
    {
        $this->loadModel("MyModel");

        $my_datas = $this->MyModel->getAll();

        $my_scripts = [["main.js"]];
        $my_css = ["main.css"];

        $this->render("Home", "Ma description", $my_datas, $my_scripts, $my_css);
    }
}
