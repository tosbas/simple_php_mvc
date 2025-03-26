<?php

use App\Model;

class MyModel extends Model{
    
    public function __construct()
    {
        $this->table = "my_table";
        $this->connect();
    }
   
}