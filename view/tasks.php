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
        <a href="/">&#x2630; Главная</a>
        &emsp;
        <a href="/?controller=security&action=logout">&#x25C4; Выйти из профиля</a>
    </h3>
<?php endif; ?>
<hr>
<form action="/?controller=tasks&action=add" method="post">
    <input type="text" name="task" placeholder="Опишите новую задачу">
    <input type="submit" value="&#128190; Добавить">
</form>

<h3>Список НЕ Выполненных задач!</h3>
<?php foreach ($tasksUndone as $key => $task): ?>
    <?php $key = $key + 1 ?>
    <div id="<?= $task->getId() ?>">
        <?= $key ?> . <?= $task->getDescription() ?>
        <a href="/?controller=tasks&action=done&id=<?= $task->getId() ?>">[&#10004; Выполнил!]</a>
        <button class="done" date-id="<?= $task->getId() ?>">[Выполнить на JS]</button>
    </div>
<?php endforeach; ?>

<h3>Список Выполненных задач!</h3>
<?php foreach ($tasksDone as $key => $task): ?>
    <?php $key = $key + 1 ?>
    <div id="<?= $task->getId() ?>">
        <?= $key ?> . <?= $task->getDescription() ?>
        <a href="/?controller=tasks&action=remove&id=<?= $task->getId() ?>">[&#128465; Удалить из памяти]</a>
    </div>
<?php endforeach; ?>

</body>

<script>
    let button = document.querySelectorAll('.done');
    button.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('date-id');
            (
                async () => {
                    const response = await fetch('/?controller=tasks&action=apidone&id=' + id);
                    const answer = await response.json();
                    document.getElementById(answer.id).remove();
                }
            )();
        })
    })

</script>