<?php
include 'system/installer/functions/create/app.php';
include 'system/installer/functions/create/controller.php';
include 'system/installer/functions/create/view.php';

$appName = $argv[2];
$controllerName = $argv[3];
$actionName = $argv[4];


createApp($appName);
createController($appName, $controllerName, $actionName);
createView($appName, $controllerName, $actionName);