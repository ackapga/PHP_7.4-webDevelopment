<?php

class TaskProvider
{
    private array $tasks;

    public function __construct()
    {
        $this->tasks = $_SESSION['tasks'] ?? [];
    }

    /**
     * @return array
     * Выводит список не законченный задач!
     */
    public function getUndoneList(): array
    {
        /**
         * @var Task $task
         */
        $tasks = [];
        foreach ($this->tasks as $task) {
            if (!$task->isDone()) {
                $tasks[] = $task;
            }
        }
        return $tasks;
    }

    // Добавляет Задачи в список
    public function addTask(Task $task): void
    {
        $_SESSION['tasks'][] = $task;
        $this->tasks[] = $task;
    }

}