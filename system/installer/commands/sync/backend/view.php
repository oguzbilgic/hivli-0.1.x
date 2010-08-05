<?php
include 'system/installer/functions/sync/backend/view.php';
include 'system/Core/Loader.php';


$appName = $argv[2];
$controllerName = $argv[3];

syncBackendView($appName, $controllerName);