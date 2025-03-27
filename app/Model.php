<?php

namespace App;

use Exception;
use PDO;

abstract class Model
{

    protected $table;

    protected $connexion;

    protected $dbhost = DB_HOST;
    protected $dbuser = DB_USER;
    protected $dbpassword = DB_PASSWORD;
    protected $dbname = DB_NAME;


    public function connect()
    {
        $this->connexion = null;

        try {
            $this->connexion = new PDO("mysql:host={$this->dbhost};dbname={$this->dbname}", $this->dbuser, $this->dbpassword);
        } catch (Exception $e) {
            echo "Une erreur est survenue: " . $e->getMessage();
        }
    }

    public function getAll()
    {
        
        $query = $this->connexion->prepare("SELECT * FROM $this->table");
        $query->execute();

        return $query->fetchAll();
    }
}
