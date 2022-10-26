<?php
require_once "model/Task.php";
require_once "model/TaskProvider.php";
require_once "model/User.php";

$pdo = require 'db.php';

session_start();

$username = null;

$pageHeader = "&#127764; Задачи";

//Перенаправим на главную если пользователь не Авторизован.
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']->getUsername();
} else {
    header("Location: /");
    die();
}

$taskProvider = new TaskProvider($pdo);

// Функция для добавления Задач!
if (isset($_GET['action']) && $_GET['action'] === 'add') {
    $taskProvider->addTask(new Task($_POST['task']));
    header("Location: /?controller=tasks");
    die();
}

// Функция для отметки выполненных Задач!
if (isset($_GET['action']) && $_GET['action'] === 'done') {
    $id = $_GET['id'];
    $taskProvider->doDoneTask($id);
    header("Location: /?controller=tasks");
    die();
}

// Функция для удаления выполненных Задач!
if (isset($_GET['action']) && $_GET['action'] === 'remove') {
    $id = $_GET['id'];
    $taskProvider->removeTask($id);
    header("Location: /?controller=tasks");
    die();
}

//  Функция для отметки выполненных Задач!        ---------- JS
if (isset($_GET['action']) && $_GET['action'] === 'apidone') {
    $id = $_GET['id'];
    $taskProvider->doDoneTask($id);

    $response = [
        'status' => 'ok',
        'id' => $id
    ];

    echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    die();
}


$tasksUndone = $taskProvider->getUndoneList();
$tasksDone = $taskProvider->getDoneList();

include "view/tasks.php";