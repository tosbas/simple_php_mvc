<?php

use App\Controller;

class Main extends Controller
{
    
    public function index()
    {
        $this->render("Home", "Ma description");
    }
}
