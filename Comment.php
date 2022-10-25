<?php

class Comment
{
    private User $author;
    private Task $task;
    private string $text;

    public function __construct(User $author, Task $task, $text)
    {
        $this->author = $author;
        $this->task = $task;
        $this->text = $text;
    }

    /**
     * @return User
     */
    public function getAuthor(): User
    {
        return $this->author;
    }

    /**
     * @return Task
     */
    public function getTask(): Task
    {
        return $this->task;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param User $author
     */
    public function setAuthor(User $author): void
    {
        $this->author = $author;
    }

    /**
     * @param Task $task
     */
    public function setTask(Task $task): void
    {
        $this->task = $task;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }


}
