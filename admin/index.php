<?php

//todo anpassen
require_once '../inc/constants.inc.php';
require_once '../inc/functions.inc.php';
require_once '../inc/helper.inc.php';
require_once '../inc/bootstrap.inc.php';

// Session needed for flash messages
session_start();

// Path to our index.php
$basePath = dirname(__FILE__);

if(isset( $_GET['controller'])) {
	$controller = $_GET['controller'];
} else {
	$controller = 'index';
}

if(isset( $_GET['action'])) {
	$action = $_GET['action'];
} else {
	$action = 'index';
}

$controllerNamespace = 'Controllers\\Backend\\';
$controllerName = $controllerNamespace . ucfirst($controller) . 'Controller';

if (class_exists($controllerName)) {
    $requestController = new $controllerName($basePath, $em);
    $requestController->run($action);
} else {
    $requestController = new Controllers\Backend\IndexController($basePath, $em);
    $requestController->render404();
}

