<?php


class ForumAnswer
{
    private int $id;
    private string $answer;
    private int $userId;
    private int $questionId;

    /**
     * ForumAnswer constructor.
     * @param int $id
     * @param string $answer
     * @param int $userId
     * @param int $questionId
     */
    public function __construct(int $id, string $answer, int $userId, int $questionId)
    {
        $this->id = $id;
        $this->answer = $answer;
        $this->userId = $userId;
        $this->questionId = $questionId;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getAnswer(): string
    {
        return $this->answer;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return int
     */
    public function getQuestionId(): int
    {
        return $this->questionId;
    }

}