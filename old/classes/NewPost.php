<?php


namespace classes;
class NewPost
{
    private $question;
    private $user;
    private $category;
    private $subject;
    private $ID;

    /**
     * ForumQuestion constructor.
     * @param $question
     * @param $user
     * @param $category
     * @param $subject
     */
    public function __construct($question, $user, $category, $subject, $ID)
    {
        $this->question = $question;
        $this->user = $user;
        $this->category = $category;
        $this->subject = $subject;
        $this->ID = $ID;
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

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }


}