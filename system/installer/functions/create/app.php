<?php
function createApp($appName, $layoutStatus = 'off')
{
	$applicationConfig = Spyc::YAMLLoad('config/applications.yaml');
	$coreConfig = Spyc::YAMLLoad('config/core.yaml');
	
	//create Application Directories
	$appFolder = $coreConfig['application_path'];
	createDir($appFolder.$appName);
	createDir($appFolder.$appName.'/controller');
	createDir($appFolder.$appName.'/config');
	createDir($appFolder.$appName.'/model');
	createDir($appFolder.$appName.'/view');
	createDir($appFolder.$appName.'/i18n');
	createDir($appFolder.$appName.'/controller/plugin');
	createDir($appFolder.$appName.'/view/layout');
	createDir($appFolder.$appName.'/view/loop');
	createDir($appFolder.$appName.'/view/modul');
	createDir($appFolder.$appName.'/view/script');
	
	//create Public Directories
	$appFolder = $coreConfig['application_path'];
	createDir('public/'.$appName);
	createDir('public/'.$appName.'/css');
	createDir('public/'.$appName.'/images');

	//Update Applications.yaml
	$applicationConfig[$appName] = array ();
	$applicationConfig[$appName]['name'] = $appName;
	$applicationConfig[$appName]['url_prefix'] = $appName.'/';
	$applicationConfig[$appName]['folder'] = $appName.'/';
	$newAppConfig = Spyc::YAMLDump($applicationConfig,4,100);
	updateFile('config/applications.yaml', $newAppConfig);

	
	
	/*
	 * Create Application's Router File
	 */
	$routerConfig['homepage'] = array();
	$routerConfig['homepage']['url'] = '/';
	$routerConfig['homepage']['param'] = array('controller' => 'index', 'action' => 'index');
	
	$routerConfig['default_action'] = array();
	$routerConfig['default_action']['url'] = '/:controller';
	$routerConfig['default_action']['param'] = array('action' => 'index');
	
	$routerConfig['default'] = array();
	$routerConfig['default']['url'] = '/:controller/:action/*';
	
	$routerConfig['default_short'] = array();
	$routerConfig['default_short']['url'] = '/:controller/:action';
	
	$newRouterConfig = Spyc::YAMLDump($routerConfig, 4, 100);
	updateFile($appFolder.$appName.'/config/router.yaml', $newRouterConfig);
	
	
	
	
	
	/*
	 * Create Application's Auth.yaml File
	 */
	$authConfig['auth'] = 'off';
	$authConfig['default_role'] = 'guest';
	$authConfig['permissions'] = 'ALL';
	$authConfig['connections'] = Null;
	
	$newAuthConfig = Spyc::YAMLDump($authConfig, 4, 100);
	updateFile($appFolder.$appName.'/config/auth.yaml', $newAuthConfig);
	
	
	
	
	
	
	
	
	
	/*
	 * Create Application's I18n.yaml File
	 */
	$authConfig['i18n'] = 'off';
	
	$newAuthConfig = Spyc::YAMLDump($authConfig, 4, 100);
	updateFile($appFolder.$appName.'/config/i18n.yaml', $newAuthConfig);
	
	
	
	
	/*
	 * Create Application's View.yaml File
	 */
	
	$viewConfig['layout'] = $layoutStatus;
	$viewConfig['default_layout_file'] = 'layout';
	
	$viewConfig['folders']['css'] = 'css/';
	$viewConfig['folders']['image'] = 'image/';
	$viewConfig['folders']['js'] = 'js/';
	$viewConfig['folders']['layout'] = 'layout/';
	$viewConfig['folders']['loop'] = 'loop/';
	$viewConfig['folders']['modul'] = 'modul/';
	$viewConfig['folders']['view'] = 'script/';
	
	$viewConfig['suffixes']['css'] = '.css';
	$viewConfig['suffixes']['js'] = '.js';
	$viewConfig['suffixes']['layout'] = '.php';
	$viewConfig['suffixes']['loop'] = '.php';
	$viewConfig['suffixes']['modul'] = '.php';
	$viewConfig['suffixes']['view'] = '.php';
	
	$newViewConfig = Spyc::YAMLDump($viewConfig, 4, 100);
	updateFile($appFolder.$appName.'/config/view.yaml', $newViewConfig);
}