<?php
include 'system/installer/functions/sync/backend/controller.php';
include 'system/installer/functions/sync/backend/view.php';
include 'system/Core/Loader.php';


$appName = $argv[2];

$coreConfig = Spyc::YAMLLoad("config/core.yaml");
$commonApp = $coreConfig['common_application'];
	


foreach (glob("application/".$commonApp."/model/*.php") as $class_filename) {
	$controllerName = str_replace("application/".$commonApp."/model/", '', $class_filename);
	$controllerName = str_replace('.php', '', $controllerName);
	
	syncBackendController($appName, $controllerName);
	syncBackendView($appName, $controllerName);
}



