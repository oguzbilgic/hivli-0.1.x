<?php
include 'system/installer/functions/create/backend/app.php';
include 'system/installer/functions/create/backend/layout.php';
include 'system/installer/functions/create/backend/controller.php';
include 'system/installer/functions/create/backend/plugin.php';
include 'system/installer/functions/create/backend/view.php';



$appName = $argv[2];
$controllerName = 'index';
$actionName = 'index';


createBackendApp($appName);
createBackendLayout($appName);
createBackendController($appName, $controllerName, $actionName);
createBackendPlugin($appName);
createBackendView($appName, $controllerName, $actionName);