<?php
function deleteApp($appName)
{
	$applicationConfig = Spyc::YAMLLoad('config/applications.yaml');
	$coreConfig = Spyc::YAMLLoad('config/core.yaml');
	if (isset($applicationConfig[$appName])){
		//delete Application Directories
		$appFolder = $coreConfig['application_path'];
		deleteDir($appFolder.$appName);
		
		//delete Public Directories
		$appFolder = $coreConfig['application_path'];
		deleteDir('public/'.$appName);
	
		//Update Applications.yaml
		unset($applicationConfig[$appName]);
		$newAppConfig = Spyc::YAMLDump($applicationConfig,4,100);
		updateFile('config/applications.yaml', $newAppConfig);
	}
	

}