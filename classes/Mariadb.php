<?php

class Mariadb
{
    public $host = "127.0.0.1";
    public $name = "school_exchange";
    public $user = "root";
    public $password = "mariadb";
    public $pdo;
    public $sqli;
    function mysqli()
    {
        if (!$this->sqli) {
            error_log("Connecting to mariadb at " . $this->host);
            $this->sqli = new mysqli($this->host, $this->user, $this->password, $this->name);
        }

        return $this->sqli;
    }

    function pdo()
    {

            $this->pdo = new PDO('mysql:host=$this->host;dbname=$this->name', $this->user, $this->password);

    }

    function test()
    {
        echo $this->host;
    }

}

