<?php
include 'system/installer/functions/sync/backend/_controller/controller.php';
function syncBackendController($appName, $controllerName)
{
	$applicationConfig = Spyc::YAMLLoad("config/applications.yaml");
	$coreConfig = Spyc::YAMLLoad("config/core.yaml");
	$appConfig = $applicationConfig[$appName];
	$commonApp = $coreConfig['common_application'];
	
	include_once  "application/".$commonApp."/model/". $controllerName.".php";
	
	$className = $controllerName;
	$model = new $className;
	
	$modelFields = $model->_tableFields;
	$specialFields = $model->_specialFields;
	$filterBy = (isset($model->_filterBy)) ? $model->_filterBy : array('field' => 'id', 'values' => '') ;
	$hasManyObject = (isset($model->_hasManyObject)) ? $model->_hasManyObject : NULL ;
	
	$controllerFolder = $appConfig["folder"]."controller/";
	$appFolder = $coreConfig["application_path"];
	$appUrlPrefix = $coreConfig["application_path"];
	
	/*
	 * controller.php
	 */
	$controllerCode = _makeSyncBackendController($appName, $controllerName, $modelFields, $specialFields, $filterBy, $hasManyObject);
	createEditFile($appFolder.$controllerFolder.$controllerName."Controller.php", $controllerCode);
	
}



