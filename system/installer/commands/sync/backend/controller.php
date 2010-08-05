<?php
include 'system/installer/functions/sync/backend/controller.php';
include 'system/Core/Loader.php';


$appName = $argv[2];
$controllerName = $argv[3];

syncBackendController($appName, $controllerName);