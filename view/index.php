<head>
    <meta charset="UTF-8">
    <title>Главная</title>
</head>
<body>
<h1><?= $pageHeader ?></h1>

<hr>

<?php if (is_null($username)): ?>

    <h2>
        <a href="?controller=registration">&Rscr; Зарегистрироваться</a>
        <a href="/?controller=security">&Amacr; Авторизоваться</a>
    </h2>

<?php else: ?>

    <h2> Добро пожаловать <?= $username ?></h2>
    <h2><a href="/?controller=tasks">&#127764; Задачи</a></h2>
    <h3><a href="/?controller=security&action=logout">&#x25C4;  Выйти из профиля</a></h3>

<?php endif; ?>
</body>