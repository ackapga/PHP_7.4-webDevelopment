<?php
require_once 'model/User.php';

session_start();

$pageHeader = 'Добро пожаловать в &#x270E;TODO';

$username = null;

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']->getName();
}

include "view/index.php";