<?php
function createController($appName, $controllerName, $actionName)
{
	$applicationConfig = Spyc::YAMLLoad('config/applications.yaml');
	$coreConfig = Spyc::YAMLLoad('config/core.yaml');
	$appConfig = $applicationConfig[$appName];
	
	$controllerFolder = $appConfig['folder'].'controller/';
	$appFolder = $coreConfig['application_path'];
	$appUrlPrefix = $coreConfig['application_path'];
	
	
	$controllerCode = "
<?php
class ".$controllerName."Controller extends Core_Controller_Base
{
	function ".$actionName."Action()
	{
		echo 'Hello World from ".$appName." application ';
	}
}";
	
	createEditFile($appFolder.$controllerFolder.$controllerName.'Controller.php', $controllerCode);
}

