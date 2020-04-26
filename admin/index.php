<?php

//todo anpassen

require_once '../inc/functions.inc.php';
require_once '../inc/helper.inc.php';

require_once '../inc/bootstrap.inc.php';

// Session needed for flash messages
session_start();

// Path to our index.php
$basePath = dirname(__FILE__);

$controller = $_GET['controller'] ?? 'index';
$action = $_GET['action'] ?? 'index';

$controllerNamespace = 'Controllers\\Backend\\';
$controllerName = $controllerNamespace . ucfirst($controller) . 'Controller';

if (class_exists($controllerName)) {
    $requestController = new $controllerName($basePath, $em);
    $requestController->run($action);
} else {
    $requestController = new Controllers\IndexController($basePath, $em);
    $requestController->render404();
}

