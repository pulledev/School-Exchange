<?php


class ForumQuestion
{
    private $question;
    private $user;
    private $category;
    private $subject;

    /**
     * ForumQuestion constructor.
     * @param $question
     * @param $user
     * @param $category
     * @param $subject
     */
    public function __construct($question, $user, $category, $subject)
    {
        $this->question = $question;
        $this->user = $user;
        $this->category = $category;
        $this->subject = $subject;
    }

    /**
     * @return mixed
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }


}