<?php

class Core_Library_Config extends Core_Library
{
	var $_config = array();
	var $_appName;
	    
	private static $_instance;
	
	private function __construcut()
	{
		self::getInstance();
	}
	
	public static function getInstance()
    {
        if (null === self::$_instance) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }
						
	public function readConfig()
	{
		$yaml = new Spyc;
		foreach ( glob ( 'config/*.yaml' ) as $class_filename ) {
			$configName = str_replace('config/', '', $class_filename);
			$configName = str_replace('.yaml', '', $configName);
			
			$this->setConfig($configName, $yaml->YAMLLoad($class_filename));
		}
	}
	
	function setConfig($config, $value)
	{
		$this->_config[$config] = $value;
	}
						
	public function readAppConfig($appName)
	{
		$this->_appName = $appName;
		$yaml = new Spyc;
		foreach ( glob ( 'application/'.$appName.'/config/*.yaml' ) as $class_filename ) {
			$configName = str_replace('application/'.$appName.'/config/', '', $class_filename);
			$configName = str_replace('.yaml', '', $configName);
			$this->setConfig('app-'.$configName, $yaml->YAMLLoad($class_filename));
		}
	}	
	
	public function getConfig($config)
	{
		return $this->_config[$config];
	}
	
	public function hasConfig($config)
	{
		if (empty($this->_config[$config]))
		{
			return false;
		} else {
			return true;
		}
	}
	
	function get()
	{
		return $this->_config;
	}

	
	
	
	
	/*
	 * CORE.YAML
	 */	
	function getCoreConfig()
	{
		return $this->_config['core'];
	}
	
	function getSitePath()
	{
		$coreConfig = $this->getCoreConfig();
		return $coreConfig['root'];
	}
	
	function getAppPath()
	{
		$coreConfig = $this->getCoreConfig();
		return $coreConfig['application_path'];
	}
		
	function getCommonAppName()
	{
		$coreConfig = $this->getCoreConfig();
		return $coreConfig['common_application'];
	}
		
	function getDefaultAppName()
	{
		$coreConfig = $this->getCoreConfig();
		return $coreConfig['default_application'];
	}
	
	function getSecurityTriger()
	{
		$coreConfig = $this->getCoreConfig();
		return $coreConfig['security_triger'];
	}
	
	function getSubdomainConfig(){
		$coreConfig = $this->getCoreConfig();
		return $coreConfig['subdomain'];
	}
	
	function getSubdomainStatus(){
		$subdomainConfig = $this->getSubdomainConfig();
		return $subdomainConfig['status'];
	}
	
	function getSubdomainList(){
		$subdomainConfig = $this->getSubdomainConfig();
		return $subdomainConfig['list'];
	}
	
	function getSubdomainParam(){
		$subdomainConfig = $this->getSubdomainConfig();
		return $subdomainConfig['param'];
	}
	
	function getFolderPath($folderName){
		$coreConfig = $this->getCoreConfig();
		return $coreConfig['folders'][$folderName];
	}
	
	/*
	 * DATABASE.YAML
	 */
	function getDatabaseConfig()
	{
		return $this->_config['database'];
	}
	
	function getDatabaseParams()
	{
		$databaseConfig = $this->getDatabaseConfig();
		return $databaseConfig['params'];
	}
	
	function getDatabaseStatus()
	{
		$databaseConfig = $this->getDatabaseConfig();
		return $databaseConfig['database'];
	}
	
	
	/*
	 * APPLICATIONS.YAML
	 */
	function getApplicationsConfig()
	{
		return $this->_config['applications'];
	}
	
	function getApplcicationConfig($applicationName = NULL)
	{
		$applicationName = (empty($applicationName)) ? $this->_appName : $applicationName ;
		$applicationsConfig = $this->getApplicationsConfig();
		return $applicationsConfig[$applicationName];
	}
	
	function getCommonApplicationConfig()
	{
		$commonApplicationName = $this->getCommonAppName();
		return $this->getApplcicationConfig($commonApplicationName);
	}
	
	function getAppUrlPrefix($applicationName = NULL)
	{
		$applicationConfig = $this->getApplcicationConfig($applicationName);
		return $applicationConfig['url_prefix'];
	}
	
	function getAppFolder($applicationName = NULL)
	{
		$applicationConfig = $this->getApplcicationConfig($applicationName);
		return $applicationConfig['folder'];
	}
	
	function getAppFolderPath($folderName, $applicationName = NULL)
	{
		$applicationConfig = $this->getApplcicationConfig($applicationName);
		return $applicationConfig['folder'].'/'.$this->getFolderPath($folderName);
	}
	
	function getCommonAppFolderPath($folderName, $applicationName = NULL)
	{
		$applicationConfig = $this->getCommonApplicationConfig();
		return $applicationConfig['folder'].'/'.$this->getFolderPath($folderName);
	}
	
	
	/*
	 * {APPLICATION}/CONFIG/
	 */
	public function getAppConfig($config)
	{
		return $this->_config['app-'.$config];
	}
	
	
	
	/*
	 * {APPLICATION}/CONFIG/AUTH.YAML
	 */
	function getAppAuthConfig()
	{
		return $this->getAppConfig('auth');
	}
	
	function getAppAuthStatus()
	{
		$appAuthConfig = $this->getAppAuthConfig();
		return $appAuthConfig['auth'];
	}
	
	function getAppAuthDefaultRole()
	{
		$appAuthConfig = $this->getAppAuthConfig();
		return $appAuthConfig['default_role'];
	}
	
	function getAppAuthPermissions()
	{
		$appAuthConfig = $this->getAppAuthConfig();
		return $appAuthConfig['permissions'];
	}
	
	function getAppAuthConnections()
	{
		$appAuthConfig = $this->getAppAuthConfig();
		return $appAuthConfig['connections'];
	}
	
	
	
	/*
	 * {APPLICATION}/CONFIG/ROUTER.YAML
	 */
	function getAppRouterRules()
	{
		return $this->getAppConfig('router');
	}

	
	
		
	
	
	/*
	 * {APPLICATION}/CONFIG/I18N.YAML
	 */
	function getAppI18nConfig(){
		return $this->getAppConfig('i18n');
	}
	function getAppI18nStatus(){
		$i18nConfig = $this->getAppI18nConfig();
		return $i18nConfig['i18n'];
	}
	function getAppI18nLanguages(){
		$i18nConfig = $this->getAppI18nConfig();
		return $i18nConfig['languages'];
	}
	
	
	
		
	
	
	/*
	 * {APPLICATION}/CONFIG/VIEW.YAML
	 */
	function getAppViewConfig()
	{
		return $this->getAppConfig('view');
	}
	
	function getAppViewLayoutStatus()
	{
		$appViewConfig = $this->getAppViewConfig();
		return $appViewConfig['layout'];
	}
	
	function getAppViewDefaultLayoutFile()
	{
		$appViewConfig = $this->getAppViewConfig();
		return $appViewConfig['default_layout_file'];
	}
		
	function getAppViewFoldersPath()
	{
		$appViewConfig = $this->getAppViewConfig();
		return $appViewConfig['folders'];
	}
		
	function getAppViewFolderPath($folderName)
	{
		$appViewConfig = $this->getAppViewConfig();
		return $appViewConfig['folders'][$folderName];
	}
	
	function getAppViewSuffixes()
	{
		$appViewConfig = $this->getAppViewConfig();
		return $appViewConfig['suffixes'];
	}
	
	function getAppViewSuffix($folderName)
	{
		$appViewConfig = $this->getAppViewConfig();
		return $appViewConfig['suffixes'][$folderName];
	}
	
	
	
	
	
	
	
	
}