<?php
include 'system/installer/functions/create/view.php';

$appName = $argv[2];
$controllerName = $argv[3];
$actionName = $argv[4];


createView($appName, $controllerName, $actionName);