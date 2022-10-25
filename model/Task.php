<?php

class Task
{
    private string $description;
    private DateTime $dateCreated;
    private DateTime $dateUpdated;
    private DateTime $dateDone;
    private bool $isDone;
    private User $user;
    private Array $comments = [];

    public function __construct(string $description, $isDone = false)
    {
        $this->description = $description;
        $this->isDone = $isDone;
    }

    public function markAsDone(): void
    {
        $this->setDateUpdated(new DateTime);
        $this->setDateDone(new DateTime);
        $this->setIsDone(true);

    }

    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return DateTime
     */
    public function getDateCreated(): DateTime
    {
        return $this->dateCreated;
    }

    /**
     * @return DateTime
     */
    public function getDateUpdated(): DateTime
    {
        return $this->dateUpdated;
    }

    /**
     * @return DateTime
     */
    public function getDateDone(): DateTime
    {
        return $this->dateDone;
    }

    /**
     * @return bool
     */
    public function isDone(): bool
    {
        return $this->isDone;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @return array
     */
    public function getComments(): array
    {
        return $this->comments;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->setDateUpdated(new DateTime);
        $this->description = $description;
    }

    /**
     * @param DateTime $dateCreated
     */
    public function setDateCreated(DateTime $dateCreated): void
    {
        $this->dateCreated = $dateCreated;
    }

    /**
     * @param DateTime $dateUpdated
     */
    public function setDateUpdated(DateTime $dateUpdated): void
    {
        $this->dateUpdated = $dateUpdated;
    }

    /**
     * @param DateTime $dateDone
     */
    public function setDateDone(DateTime $dateDone): void
    {
        $this->dateDone = $dateDone;
    }

    /**
     * @param bool $isDone
     */
    public function setIsDone(bool $isDone): void
    {
        $this->isDone = $isDone;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @param Comment $comment
     */
    public function setComment(Comment $comment): void
    {
        $this->comments[] = $comment;
    }

}
