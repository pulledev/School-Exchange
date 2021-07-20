<?php

class Mariadb
{
    private $host = "127.0.0.1";
    private $name = "school_exchange";
    private $user = "root";
    private $password = "mariadb";
    private $pdo;


    function pdo()
    {
        if (!$this->pdo) {
            error_log("Connecting to mariadb at " . $this->host);
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->name", $this->user, $this->password);
        }
        return $this->pdo;
    }

    function test()
    {
        echo $this->host;
    }

}

