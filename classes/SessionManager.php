<?php

class SessionManager
{
    private Mariadb $mariadb;
    private ?User $loggedInUser = null;

    /**
     * SessionHandler constructor.
     */
    public function __construct(Mariadb $mariadb)
    {
        session_start();
        $this->mariadb = $mariadb;
    }

    /**
     * @return User
     */
    public function getLoggedInUser(): ?User
    {

        error_log("getLoggedInUser");
        
        if (isset($_SESSION["userID"])) {
            error_log("Found userID Session_Cookie");
            if (!$this->loggedInUser) {
                $userID = $_SESSION["userID"];
                if ($userID) {
                    $this->loggedInUser = $this->mariadb->findUser($userID);
                }
            }
        }
        return $this->loggedInUser;
    }

}