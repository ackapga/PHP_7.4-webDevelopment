<?php
require_once 'model/UserProvider.php';

$pdo = require 'db.php';

session_start();

$error = null;

//   Проверяет Логин и Пароль
if (isset($_POST['username'], $_POST['password'])) {
    ['username' => $username, 'password' => $password] = $_POST;

    //   Подключаем Провайдер и работаем его Методом
    $userProvider = new UserProvider($pdo);
    $user = $userProvider->getByUsernameAndPassword($username, $password);

    if ($user === null) {
        $error = 'Пользователь с указанными учетными данными не найден';
    } else {
        $_SESSION['username'] = $user;
        $_SESSION['user_id'] = $user->getId();
        header("Location: /");
        die();
    }
}

//   Кнопка Выхода
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    unset($_SESSION['username']);
    unset($_SESSION['task']);
    header("Location: /");
    die();
}

include "view/signin.php";