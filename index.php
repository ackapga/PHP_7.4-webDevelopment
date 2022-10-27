<?php

require_once 'errorHandler.php';
require_once 'Logger.php';

$controller = $_GET['controller'] ?? 'index';

$routes = require 'routes.php';

require_once $routes[$controller];