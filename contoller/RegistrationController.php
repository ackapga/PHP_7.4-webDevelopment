<?php
require_once "model/User.php";
require_once "model/UserProvider.php";
$pdo = require 'db.php';

session_start();

if (isset($_POST['reg_name']) && isset($_POST['reg_username']) && isset($_POST['reg_password'])) {
    ['reg_name' => $reg_name, 'reg_username' => $reg_username, 'reg_password' => $reg_password] = $_POST;

    $user = new User($reg_username);
    $user->setName($reg_name);

    $reg_user = new UserProvider($pdo);
    $user->setId($reg_user->registerUser($user, $reg_password));

    $_SESSION['username'] = $user;
    $_SESSION['user_id'] = $user->getId();
    header('Location: /');
    die();
}

require_once 'view/registration.php';