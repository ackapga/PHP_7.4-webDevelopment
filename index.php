<?php

require_once "Task.php";
require_once "User.php";
require_once "Comment.php";
require_once "TaskService.php";

$user = new User('Ackap', 'ackapga@gmail.com');

$task = new Task($user);
$task->setDescription('Пойти в магазин!');
$task->setPriority(1);

TaskService::addComment($user, $task, 'Пойду в 2 часа дня!');
TaskService::addComment($user, $task, 'Магазин закрыт!');


echo "Описания: " . PHP_EOL;

/**
 * @var Comment $comment
 */

foreach ($task->getComments() as $key => $comment) {
    echo "Название задачи: " . $comment->getTask()->getDescription() . ' ';
    echo $comment->getText() . PHP_EOL;
}


