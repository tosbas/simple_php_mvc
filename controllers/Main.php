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

        $this->render("Home", "Ma description", $my_datas);
    }
}
