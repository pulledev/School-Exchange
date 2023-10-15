<?php


namespace classes;

use classes\Config;
use classes\ForumAnswer;
use classes\ForumQuestion;
use classes\User;

class Mariadb
{
    private $host;
    private $name = "school_exchange";
    private $user;
    private $password;
    private $pdo;

    /**
     * Mariadb constructor.
     * @param Config $config
     */
    public static function checkTables()
    {

    }

    public function __construct(Config $config)
    {
        $this->host = $config->getValue('dbhost');
        $this->user = $config->getValue('dbuser');
        $this->password = $config->getValue('dbpassword');
    }

    function test()
    {
        echo $this->host;
    }

    /**
     * @return ForumQuestion[]
     */
    function listForumQuestions()
    {
        $res = $this->pdo()->query("SELECT * FROM forum_quest ORDER BY ID DESC");
        $results = [];
        while ($row = $res->fetch()) {
            $results[] = new ForumQuestion($row["quest"], $row["userID"], $row["sort"], $row["head"], $row["ID"]);
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

    function createQuestion(ForumQuestion $forumQuestion)
    {
        $res = $this->pdo()->prepare("INSERT INTO forum_quest(quest, sort, head, userID) VALUES (:quest, :sort, :head, :usr)");
        $res->bindValue("quest", $forumQuestion->getQuestion());
        $res->bindValue("usr", $forumQuestion->getUserId());
        $res->bindValue("sort", $forumQuestion->getCategory());
        $res->bindValue("head", $forumQuestion->getSubject());
        $res->execute();
    }

    function createAnswer(ForumAnswer $forumAnswer)
    {
        $res = $this->pdo()->prepare("INSERT INTO forum_reply(answer, userId, questionId) VALUES (:answ, :usr, :questId)");
        $res->bindValue("answ", $forumAnswer->getAnswer());
        $res->bindValue("usr", $forumAnswer->getUserId());
        $res->bindValue("questId", $forumAnswer->getQuestionId());
        $res->execute();
    }

    /**
     * @return ForumAnswer[]
     */
    function listAnswers(int $questionId)
    {
        $res = $this->pdo()->query("SELECT * FROM forum_reply WHERE questionId = " . $questionId . " ORDER BY ID DESC");
        $resultsAnswer = [];
        while ($row = $res->fetch()) {
            $resultsAnswer[] = new ForumAnswer($row["ID"], $row["answer"], $row["userId"], $row["questionId"]);

        }
        return $resultsAnswer;
    }

    function findUser(int $id): ?User
    {
        error_log("findUser: " . $id);
        $stmt = $this->pdo()->prepare("SELECT * FROM user WHERE ID = :value");
        $stmt->bindParam(":value", $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch();
        if ($row) {
            error_log("Found User:" . $row["username"]);
            return new User($row["username"], $row["ID"], $row["rank"], $row["email"]);
        }
        return null;
    }

    function findUserByName(string $username, string $password)
    {
        error_log("FindUserByName User: " . $username . " Password: " . $password);
        $stmt = $this->pdo()->prepare("SELECT * FROM user WHERE username =:usr AND password =:pwd");
        $stmt->bindParam(":usr", $username, PDO::PARAM_STR);
        $stmt->bindParam(":pwd", $password, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch();
        if ($row) {
            error_log("FoundUserbyName:" . $row["username"]);
            return new User($row["username"], $row["ID"], $row["rank"], $row["email"]);
        }

        return null;
    }

    function deleteQuestion(int $id)
    {
        $this->pdo()->query("DELETE FROM forum_quest WHERE ID = " . $id);
        $this->pdo()->query("DELETE FROM forum_reply WHERE questionId = " . $id);
    }

    function findQuestion(int $id): ?ForumQuestion
    {
        $res = $this->pdo()->query("SELECT * FROM forum_quest WHERE ID = " . $id);
        if ($row = $res->fetch()) {
            return new ForumQuestion($row["quest"], $row["userID"], $row["sort"], $row["head"], $row["ID"]);
        } else {
            return null;
        }

    }

    function listUser(): array
    {
        $res = $this->pdo()->query("SELECT * FROM `user`");
        $resultsUser = [];
        while ($row = $res->fetch()) {
            $resultsUser[] = new User($row["username"], $row["ID"], $row["rank"], $row["email"]);
        }
        return $resultsUser;
    }

    function deleteUser(int $id)
    {
        $this->pdo()->query("DELETE FROM `user` WHERE ID = " . $id);
    }
}

