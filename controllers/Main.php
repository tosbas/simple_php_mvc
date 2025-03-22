<?php

use App\Controller;

class Main extends Controller
{
    
    public function index()
    {
        $this->render("main", [], "Home", "Ma description");
    }
}
