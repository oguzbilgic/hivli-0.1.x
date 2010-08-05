<?php
include 'system/installer/functions/create/controller.php';

$appName = $argv['2'];
$controllerName = $argv['3'];
$actionName = $argv['4'];

createController($appName, $controllerName, $actionName);