<?php 
include 'system/installer/functions/sync/backend/_view/index.php';
include 'system/installer/functions/sync/backend/_view/list.php';
include 'system/installer/functions/sync/backend/_view/sidebar.php';
include 'system/installer/functions/sync/backend/_view/add.php';
include 'system/installer/functions/sync/backend/_view/update.php';
include 'system/installer/functions/sync/backend/_view/show.php';
include 'system/installer/functions/sync/backend/_view/layout.php';
function syncBackendView($appName, $controllerName)
{
	$applicationConfig = Spyc::YAMLLoad('config/applications.yaml');
	$coreConfig = Spyc::YAMLLoad('config/core.yaml');
	$appConfig = $applicationConfig[$appName];
	$commonApp = $coreConfig['common_application'];
	
	if (!class_exists($controllerName)){
		include_once  "application/".$commonApp."/model/". $controllerName.".php";
	}
	
	
	$className = $controllerName;
	$model = new $className;
	
	$modelFields = $model->_tableFields;
	$specialFields = $model->_specialFields;
	$hasManyObject = (isset($model->_hasManyObject)) ? $model->_hasManyObject : NULL ;
	$filterBys = (isset($model->_filterBy)) ? $model->_filterBy : NULL ;
	$searchBys = (isset($model->_searchBy)) ? $model->_searchBy : NULL ;
	
	$appFolder = $coreConfig['application_path'];
	$viewFolder = $coreConfig['application_path'].$appConfig['folder'].'view/';
	
	$scriptFolder = $viewFolder.'script/';
	
	
	createDir($scriptFolder.$controllerName);
	
	/*
	 * Many
	 */
	$hasManymodelFields = NULL;
	$hasManyspecialFields = NULL;
	
	if (isset($hasManyObject)){
		if (!class_exists($hasManyObject['name'])){
			include_once  "application/".$commonApp."/model/". $hasManyObject['name'].".php";
		}
		$className = $hasManyObject['name'];
		$hasManyModel = new $hasManyObject['name'];
		
		$hasManymodelFields = $hasManyModel->_tableFields;
		$hasManyspecialFields = $hasManyModel->_specialFields;
		
	}
	
	
	
	
	
	
	
	
	
	
	/*
	 * index.php
	 */
	$indexCode = _makeSyncBackendViewIndex($controllerName, $modelFields);
	createEditFile($scriptFolder.$controllerName.'/index.php', $indexCode);

	/*
	 * layout.php
	 */
	$layoutCode = _makeSyncBackendViewLayout($appName);
	createEditFile($viewFolder.'layout/layout.php', $layoutCode);
	

	/*
	 * show.php
	 */
	$showCode = _makeSyncBackendViewShow($appName, $controllerName, $modelFields, $specialFields, $hasManyObject,$hasManymodelFields, $hasManyspecialFields);
	createEditFile($scriptFolder.$controllerName.'/show.php', $showCode);
	
	
	
	/*
	 * loop/MODELlist.php
	 */
	$listCode = _makeSyncBackendViewlist($appName, $controllerName, $modelFields, $specialFields);
	createEditFile($viewFolder.'loop/'.$controllerName.'List.php', $listCode);
	
	/*
	 * sidebar.php
	 */

	$sidebarCode = _makeSyncBackendViewSidebar($appName, $controllerName, $modelFields, $specialFields , $filterBys, $searchBys);
	createEditFile($viewFolder.'modul/sidebars/'.$controllerName.'.php', $sidebarCode);
	
	/*
	 * add.php
	 */
	$addCode = _makeSyncBackendViewAdd($appName, $controllerName, $modelFields);
	createEditFile($scriptFolder.$controllerName.'/add.php', $addCode);
	
	
	/*
	 * update.php
	 */
	$updateCode = _makeSyncBackendViewUpdate($appName, $controllerName, $modelFields, $specialFields);
	createEditFile($scriptFolder.$controllerName.'/update.php', $updateCode);
	
	
}
