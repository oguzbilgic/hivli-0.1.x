<?php

class Object 
{
	var $_vars;
	
	function __get($key){
		return $this->_vars[$key];
	}
	
	function __set($key, $value){
		$this->_vars[$key] = $value;
	}
	
	function get(){
		return $this->_vars;
	}
	
	function ksort(){
		ksort($this->_vars);
	}
}