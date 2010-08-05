<?php

function createView($appName, $controllerName, $actionName)
{
	$applicationConfig = Spyc::YAMLLoad('config/applications.yaml');
	$coreConfig = Spyc::YAMLLoad('config/core.yaml');
	$appConfig = $applicationConfig[$appName];
	$viewFolder = $appConfig['folder'].'view/';
	$appFolder = $coreConfig['application_path'];
	
	createDir($appFolder.$viewFolder.'script/'.$controllerName);
	createFile($appFolder.$viewFolder.'script/'.$controllerName.'/'.$actionName.'.php');
}

