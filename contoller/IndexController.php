<?php
require_once 'model/User.php';
/**
 * @var User $username
 */

session_start();

$pageHeader = 'Добро пожаловать в TODO';

$username = null;

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']->getUsername();
}

include "view/index.php";