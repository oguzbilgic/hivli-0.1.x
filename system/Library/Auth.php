<?php
class Core_Library_Auth extends Core_Library 
{
	//postDetectApp
	var $_permissions;
	var $_identityRole;
	var $_connections;
	var $_securityTriger;

	var $_identity = NULL;
	var $_identityData;

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
    
    function postDetectApp()
    {
    	if($this->config->getAppAuthStatus())
    	{
	    	$this->_permissions = $this->config->getAppAuthPermissions();
	    	$this->_identityRole = $this->config->getAppAuthDefaultRole();
	    	$this->_connections = $this->config->getAppAuthConnections();
	    	$this->_securityTriger = $this->config->getSecurityTriger();
    	}    	
    }
    
    public function isAllowed($controller, $action, $role = '')
    {
    	$role = (empty($role)) ?  $this->_identityRole : $role ;
       	$permissions = $this->_permissions[$role];
    	$connections = $this->_connections;
    	
    	if(!$this->config->getAppAuthStatus())
    	{
    		return TRUE;
    	}
    	if ($permissions == 'ALL')
    	{
    		return TRUE;
    	}
    	

   		if(isset($permissions[$controller]))
   		{
    		if ( $permissions[$controller] == 'ALL')
    		{
    			return TRUE; 
    		}
    			    		
    		if (in_array($action, $permissions[$controller]))
    		{
    			return TRUE;
    		}	
   		}

    	
    	if (isset($connections[$role]))
    	{
    		$newRole = $connections[$role];
    		if($this->isAllowed($controller, $action, $newRole))
    		{
    			return TRUE;
    		}
    	}
    	
    	RETURN FALSE;
    }
    
    public function hasIdentity()
    {
    	$this->checkSession();
    	if (!empty($this->_identity))
    	{
    		return TRUE;
    	} else {
    		return FALSE;
    	}
    }
    
    public function checkSession()
    {
    	if (!empty($_SESSION[$this->_securityTriger.'_user_id']))
    	{
    		$this->createIdentity($_SESSION[$this->_securityTriger.'_user_id']);
    	}
    }
    
    public function createIdentity($id)
    {
    	$this->_identity = $id;
    	$_SESSION[$this->_securityTriger.'_user_id'] = $id;
    }
    
    public function clearIdentity()
    {
    	unset($_SESSION[$this->_securityTriger.'_user_id']);
    	unset($this->_identity);
    	unset($this->_identityRole);
    }
    
    public function recordIdentityData($data)
    {
    	$this->_identityData = $data;
    }
    
    public function getIdentityData($field = TRUE)
    {
    	if ($field)
    	{
    		return $this->_identityData;
    	}
    	return $this->_identityData[$field];
    }
    
    public function getIdentity()
    {
    	$this->checkSession();
    	return $this->_identity;	
    }

    function setRole($role)
    {
    	$this->_identityRole = $role;
    }
    
    function getRole()
    {
    	return $this->_identityRole;
    }
    
    function isActive()
    {
    	$status = $this->config->getAppAuthStatus();
    	if ($status)
    	{
    		return TRUE;
    	}
    	RETURN FALSE;
    }
    
}
