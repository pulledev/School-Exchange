<?php


class User
{


    private string $username;
    private int $ID;
    private int $rank;
    private string $email;

    /**
     * User constructor.
     * @param string $username
     * @param int $ID
     * @param int $rank
     * @param string $email
     */
    public function __construct(string $username, int $ID, int $rank, string $email)
    {
        $this->username = $username;
        $this->ID = $ID;
        $this->rank = $rank;
        $this->email = $email;
    }



    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return int
     */
    public function getID(): int
    {
        return $this->ID;
    }

    /**
     * @return int
     */
    public function getRank(): int
    {
        return $this->rank;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }


}