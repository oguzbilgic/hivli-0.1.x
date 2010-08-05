<?php

class Core_Library_Router extends Core_Library
{					
	//preDetectApp
	var $_sitePath;
	var $_applications;
	var $_defaultAppName;
	var $_subdomainStatus;
	var $_subdomainParam;
	var $_subdomainList;
	//posDetectApp
	var $_rules;
	
	var $_url;
	
	private static $_instance;
	private function __construcut(){
		self::getInstance();
	}
		
	public static function getInstance(){
		if (null === self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }	
    
    function preDetectApp(){
		$this->_sitePath = $this->config->getSitePath();
		$this->_applications = $this->config->getApplicationsConfig();
		$this->_defaultAppName = $this->config->getDefaultAppName();
		$this->_subdomainParam = $this->config->getSubdomainParam();
		$this->_subdomainList = $this->config->getSubdomainList();
		$this->_subdomainStatus = $this->config->getSubdomainStatus();
    }
	
    function postDetectApp(){
    	$this->reviseRules($this->config->getAppRouterRules());
    }
    
	function detectApp(){
		$url = substr($_SERVER['REQUEST_URI'], strlen($this->_sitePath));
		$applications = $this->_applications;
		
		$this->_url = $url;
		$this->setParam('application', $this->_defaultAppName);
		
		foreach ($applications as $application){
			$application['url_prefix'] = '/'.$application['url_prefix'];
			$applicationUrlPrefix = explode('/', $application['url_prefix']);
			$applicationUrlPrefix = $applicationUrlPrefix[1];
			$applicationUrlPrefixCharNum = strlen($application['url_prefix']);
			$urlPrefix = explode('/', $url);
			$urlPrefix = $urlPrefix[1];
			if ($urlPrefix == $applicationUrlPrefix){
				$this->setParam('application', $application['name']);
				$newUrl = substr($url, $applicationUrlPrefixCharNum-1);
				$this->_url = $newUrl;
			}	
		}
		/*
		 * Detect Subdomain
		 */
		if ($this->_subdomainStatus){
			$host = $_SERVER['HTTP_HOST'];
			$hostArray = explode('.', $host);
			if (in_array($hostArray[0], $this->_subdomainList)){
				$this->setParam($this->_subdomainParam, $hostArray[0]);
			}			
		}
	}
	
	function route(){
		$this->_explodeUrl();
		$this->_selectRule();
		$this->_routeMethod();
	}
		
	function _explodeUrl(){
		$url['url'] = $this->_url;
		$url['parts'] = explode('/', $url['url']);
		foreach ($url['parts'] as $i => $part){
			if (empty($part)){
				unset($url['parts'][$i]);
			}
		}
		$url['partNumber'] = count($url['parts']);
		$url['/Number'] = substr_count($url['url'], '/');
		
		$this->_url = $url;
	}
	
	function _selectRule(){
		$this->_decodeMethods();
		$this->_matchMethod();
		$this->_resultMethod();
		$this->_selectMethod();
	}
	
	function _decodeMethods(){
		foreach ($this->getRules() as $name => $method){
				$url['url'] = $method['url'];
				$url['name'] = $name;
				$url['param'] = (isset($method['param'])) ? $method['param'] : NULL ;
				$url['parts'] = explode('/', $url['url']);
				foreach ($url['parts'] as $i => $part){
					if (empty($part)){
						unset($url['parts'][$i]);
					}
				}
				$url['partNumber'] = count($url['parts']);
				$url['/Number'] = substr_count($url['url'], '/');
				
				if (isset($url['parts'][$url['partNumber']]) && $url['parts'][$url['partNumber']] == '*'){
					$url['long'] = TRUE;
				} else {
					$url['long'] = FALSE;
				}
	
				$decodedMethods[] = $url;
		}		
		$this->reviseRules($decodedMethods);
	}
	
	function _matchMethod(){
		$url = $this->_url;
		$methods = $this->getRules();
		foreach ($methods as $method){
			if (!$method['long']){
				$method = $this->__matchShortRule($method);
			} else {
				$method = $this->__matchLongRule($method);
			}
			$matchedMethods[] = $method;
		}
		$this->reviseRules($matchedMethods);
	}
		
	function _resultMethod(){
		$methods = $this->getRules();
		foreach ($methods as $method){
			$method['last'] = 'ok';
			foreach ($method['result'] as $i => $result){
				if ($result == '!'){
					$method['last'] = '!';
				}
			}
			$resultedMethods[] = $method;
		}
		$this->reviseRules($resultedMethods);
	}
	
	function _selectMethod(){
		$methods = $this->getRules();
		foreach ($methods as $i => $method){
			if ($method['last'] == 'ok'){
				$ruleId = $i;
				break;
			}
		}
		
		$this->_selectedRule = $methods[$ruleId];
	}
	
	function _routeMethod(){
		$method = $this->_selectedRule;
		$url = $this->_url;
		if (isset($method['param'])){
			foreach ($method['param'] as $param => $value){
				$this->setParam($param, $value);
			}
		}
		
		foreach ($method['parts'] as $i => $part){
			if (substr($part, 0, 1) == ':'){
				$this->setParam(substr($part, 1), $url['parts'][$i]);
			}
		}
		
		if (!empty($method['parts']) && $method['parts'][$method['partNumber']] == '*'){
			$a = 1;
			foreach ($url['parts'] as $i => $part){
				if ($i >= $method['partNumber']){ 
					if ( isset($url['parts'][$i+1]) && $a ==1 | $a ==3 | $a ==5){
						$this->setParam($part, $url['parts'][$i+1]);
					}
					$a++;
				}
			}
		}
	}
	
	function __matchLongRule($rule)
	{
		$url = $this->_url;
		if ($url['partNumber'] >= $rule['partNumber']){
			foreach ($rule['parts'] as $i => $part){
				if (substr($part, 0 ,1) != ':' && $i != $rule['partNumber']){
					if ($parts == $url['parts'][$i]){
						$rule['result'][] = 'ok';
						$rule['resultDesc'][] = $rule['parts'][$i]." is same with ".$part;
					} else {
						$rule['result'][] = '!';
					}
				} else {
					$rule['result'][] = 'ok';
				}
			}
		} else {
			$rule['result'][] = '!';
			$rule['resultDesc'][] = "!!!!!Rule's Part Number is not more than url's part number";
		}
		return $rule;
	}
	
	function __matchShortRule($rule){
		$url = $this->_url;
		if ($url['partNumber'] == $rule['partNumber']){
			if ($url['partNumber']){
				foreach ($url['parts'] as $i => $part){
					if (substr($rule['parts'][$i], 0 ,1) != ':'){
						if ($rule['parts'][$i] == $part){
							$rule['result'][] = 'ok';
							$rule['resultDesc'][] = $rule['parts'][$i]." is same with ".$part;
						} else {
							$rule['result'][] = '!';
							$rule['resultDesc'][] = '!!!!!'.$rule['parts'][$i]." is same with ".$part;
						}
					}
				}
			}
			$rule['result'][] = 'ok';
			$rule['resultDesc'][] = "Url has parts";
		} else {
			$rule['result'][] = '!';
			$rule['resultDesc'][] = "!!!!!Rule's Part Number is not equal to url's part number";
		}
		
		return $rule;
	}
	
	function redirect($params){
		$params['app'] = (isset($params['app'])) ? $params['app'] : $this->getParam('application') ;
		$params['controller'] = (isset($params['controller'])) ? $params['controller'] : $this->getParam('controller') ;
		$params['action'] = (isset($params['action'])) ? $params['action'] : $this->getParam('action') ;
		
		$url = (strlen($this->config->getAppUrlPrefix($params['app'])) > 1) ? $this->config->getAppUrlPrefix($params['app']) : NULL ;
		$url .= $params['controller'].'/';
		$url .= $params['action'].'/';
		foreach ($params as $param => $value){
			switch ($param) {
				case 'app':
				case 'controller':
				case 'action':
					break;		
				default:
					$url .= $param.'/'.$value.'/';;
					break;
			}
		}
		header ( 'Location: http://'.$_SERVER['SERVER_NAME'].'/'.$this->_sitePath.$url );
		exit();
	}
	
	function getRules(){
		return $this->_rules;
	}
	
	function reviseRules($newRules){
		$this->_rules = $newRules;
	}
	
	function hasPost(){
		if (empty($_POST)){
			return FALSE;
		}
		return TRUE;
	}
	
	function getPost($param){
		return $_POST[$param];
	}
	
	function getPosts(){
		return $_POST;
	}
	
	function getControllerName(){
		return $this->_params['controller'];
	}
	
	function getActionName(){
		return $this->_params['action'];
	}
	
	function getApplicationName(){
		return $this->_params['application'];
	}
	
	function getParam($param){
		return $this->_params[$param];
	}
	
	function getParams(){
		return $this->_params;
	}
	
	function isParam($param){
		if (!empty($this->_params[$param])){
			return TRUE;
		}
		RETURN FALSE;
	}
	
	function setParam($param, $value){
		$this->_params[$param] = $value;
	}
	
	function getSelectedRuleName(){
		return $this->_selectedRule['name'];
	}
}