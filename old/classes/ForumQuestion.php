<?php

namespace classes;
class ForumQuestion
{
    private string $question;
    private int $userId;
    private string $category;
    private string $subject;
    private int $ID;

    /**
     * ForumQuestion constructor.
     * @param $question
     * @param $userId
     * @param $category
     * @param $subject
     */
    public function __construct(string $question, int $userId, string $category, string $subject, int $ID)
    {
        $this->question = $question;
        $this->userId = $userId;
        $this->category = $category;
        $this->subject = $subject;
        $this->ID = $ID;
    }

    /**
     * @return mixed
     */
    public function getQuestion(): string
    {
        return $this->question;
    }

    /**
     * @return mixed
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return mixed
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @return mixed
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @return mixed
     */
    public function getID(): int
    {
        return $this->ID;
    }

}