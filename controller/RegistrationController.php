<?php
require_once 'model/User.php';
require_once 'model/UserProvider.php';

$pdo = require 'db.php';

$error = null;

session_start();

// Не допускает Авторизованного пользователя на страницу регистраций.
if (isset($_SESSION['username'])) {
    header('Location: /');
}

if (isset($_POST['reg_name']) && isset($_POST['reg_username']) && isset($_POST['reg_password'])) {
    ['reg_name' => $reg_name, 'reg_username' => $reg_username, 'reg_password' => $reg_password] = $_POST;

    try {
        if (strlen($reg_username) > 10) {
            throw new Exception('Не больше 10 символов!');
        }
    } catch (Exception $exception) {
        $error = $exception->getMessage();
        include 'view/registration.php';
        die();
    }


    $user = new User($reg_username);
    $user->setName($reg_name);

    $userProvider = new UserProvider($pdo);
    try {
        $user->setId($userProvider->registerUser($user, $reg_password));
    } catch (Exception $exception) {
        $error = 'Пользователь с таким именем уже зарегистрирован';
        include 'view/registration.php';
        die();
    }

    $_SESSION['username'] = $user;
    $_SESSION['user_id'] = $user->getId();
    header('Location: /');
    die();
}

include "view/registration.php";