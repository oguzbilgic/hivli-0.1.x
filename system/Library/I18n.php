<?php

class Core_Library_I18n extends Core_Library
{
	//postDetectApp
 	var $_languages;
 	var $_languagePath;
 	
 	var $_language;
 	var $_dictionary;

	
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
    
    function postDetectApp(){
    	if ($this->config->getAppI18nStatus()){
    		$this->_languages = $this->config->getAppI18nLanguages();
       		$this->_languagePath = $this->config->getAppPath().$this->config->getAppFolderPath('i18n');
    	}
    }
    
    function setI18n($language){
    	$this->_language = $language;
    	$this->_updateDictionary();
    }
	
    function _updateDictionary(){
    	include  $this->_languagePath.$this->_languages[$this->_language];
    	$this->_dictionary = $lang;
    }
    
    function getDictionary(){
    	return $this->_dictionary;
    }
    
    function getWordDef($word){
    	return $this->_dictionary[$word];
    }
    
}