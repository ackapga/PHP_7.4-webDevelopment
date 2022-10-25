<?php
require_once 'model/UserProvider.php';

session_start();

$error = null;

//   Проверяет Логин и Пароль
if (isset($_POST['username'], $_POST['password'])) {
    ['username' => $username, 'password' => $password] = $_POST;

    //   Подключаем Провайдер и работаем его Методом
    $userProvider = new UserProvider();
    $user = $userProvider->getByUsernameAndPassword($username, $password);
    if ($user === null) {
        $error = 'Пользователь с указанными учетными данными не найден';
    } else {
        $_SESSION['username'] = $user;
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
