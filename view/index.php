<head>
    <meta charset="UTF-8">
    <title>Главная</title>
</head>
<body>
<h1><?= $pageHeader ?></h1>

<hr>

<?php if (is_null($username)): ?>

    <h2><a href="/?controller=security">Войти</a></h2>

<?php else: ?>
    <h2> Добро пожаловать <?= $username ?></h2>
    <h2><a href="/?controller=tasks">Задачи</a></h2>
    <h3><a href="/?controller=security&action=logout">Выйти</a></h3>


<?php endif; ?>
</body>