<?php
class Mariadb
{
    private $host = "127.0.0.1";
    private $name = "school_exchange";
    private $user = "root";
    private $password = "mariadb";
    private $pdo;

    /**
     * Mariadb constructor.
     */
    /*public function __construct()
    {
        $config = new Config();
        $this->host = $config->getValue('dbhost');

    }*/


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

    /**
     * @return ForumQuestion[]
     */
    function fetchForumQuestions ()
    {
        $res = $this->pdo()->query("SELECT * FROM forum_quest");
        $results = [];
        while ($row = $res->fetch()) {
            $results[] = new ForumQuestion($row["quest"], $row["user"], $row["sort"], $row["head"], $row["ID"]);
        }
        return $results;
    }

    function insertNewQuestions ($insertSubject, $insertUserID, $insertUser, $insertSort, $insertQuest)
    {
        $this->pdo()->query("INSERT INTO forum_quest (head, userID, user, sort, quest) VALUES ($insertSubject, $insertUserID, $insertUser, $insertSort, $insertQuest)");
    }
}

