<?php

class CommentProvider
{
    public static function addComment(User $author, Task $task, $text): void
    {
        $comment = new Comment($author, $task, $text);
        $task->setComment($comment);
    }

}