<?php

class Mariadb
{
    private $host;
    private $name = "school_exchange";
    private $user = "root";
    private $password = "mariadb";
    private $pdo;

    /**
     * Mariadb constructor.
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->host = $config->getValue('dbhost');
    }

    function test()
    {
        echo $this->host;
    }

    /**
     * @return ForumQuestion[]
     */
    function fetchForumQuestions()
    {
        $res = $this->pdo()->query("SELECT * FROM forum_quest");
        $results = [];
        while ($row = $res->fetch()) {
            $results[] = new ForumQuestion($row["quest"], $row["user"], $row["sort"], $row["head"], $row["ID"]);
        }
        return $results;
    }

    function pdo()
    {
        if (!$this->pdo) {
            error_log("Connecting to mariadb at " . $this->host);
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->name", $this->user, $this->password);
        }
        return $this->pdo;
    }

    function insertNewQuestions($insertSubject, $insertUserID, $insertUser, $insertSort, $insertQuest)
    {
        $this->pdo()->query("INSERT INTO forum_quest (head, userID, user, sort, quest) VALUES ($insertSubject, $insertUserID, $insertUser, $insertSort, $insertQuest)");
    }


    function findUser(int $id): ?User
    {
        $stmt = $this->pdo()->prepare("SELECT * FROM user WHERE ID = :value");
        $stmt->bindParam(":value", $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch();
        if ($row) {
            return new User($row["username"],$row["ID"], $row["rank"], $row["email"]);
        }

        return null;
    }

    function findUserByName( string $username, string $password)
    {
        $stmt = $this->pdo()->prepare("SELECT * FROM user WHERE username =:usr AND password =:pwd");
        $stmt->bindParam(":usr", $username, PDO::PARAM_STR);
        $stmt->bindParam(":pwd", $password, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch();
        if ($row) {
            return new User($row["username"],$row["ID"], $row["rank"], $row["email"]);
        }

        return null;
    }
}

