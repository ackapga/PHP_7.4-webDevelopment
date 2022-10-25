<?php
/**
 * @var Task $task
 */
?>
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
</head>
<body>
<h1><?= $pageHeader ?></h1>

<hr>

<?php if (is_null($username)): ?>
    <a href="/?controller=security">Войти</a>
<?php else: ?>
    <h2> Вы на странице списков Задач <?= $username ?></h2>
    <h3>
        <a href="/">&#128190; Главная</a>
        &emsp;
        <a href="/?controller=security&action=logout">	&#9658; Выйти из профиля</a>
    </h3>
<?php endif; ?>
<hr>
<form action="/?controller=tasks&action=add" method="post">
    <input type="text" name="task" placeholder="Опишите новую задачу">
    <input type="submit" value="Добавить">
</form>
<?php foreach ($tasks as $key => $task): ?>
<?php $key = $key + 1 ?>
    <div>
        <?=$key?>. <?= $task->getDescription() ?> <a href="#"> [&#128465;Удалить]</a>
    </div>
<?php endforeach; ?>


</body>
