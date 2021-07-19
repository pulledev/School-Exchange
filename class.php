<?php

class mariadb
{
    public $host = "localhost";
    public $name = "school exchange";
    public $user = "root";
    public $password = "mariadb";
    function mysqli()
    {
        mysqli_connect($this->host, $this->user, $this->password, $this->name);
    }

    function test()
    {
        echo $this->host;
    }
    function pdo()
    {
        new PDO('mysql:host=$this->host;dbname=$this->name', $this->user, $this->password);
    }
}
$h = new mariadb();
$h->test();
$h->host = "<br>testttt";
$h->test();
