<?php
class i18n extends Core_Plugin_Base {
	var $_orderNumber = 5;
	
	function postRoute(){
		$Router = $this->get('Router');
		$View = $this->get("View");
		$I18n = $this->get("I18n");
		
		$param = ($Router->isParam('lang')) ? $Router->getParam('lang') : NULL ;
		switch ($param){
			case 'tr':
			case 'en':
			case 'de':
			case 'fr':
			case 'nl':
				$language = $Router->getParam('lang');
				break;
			default:
				$language = 'tr';
		}
		
		$I18n->setI18n($language);
		$View->setViewParamFromArray(array('lang' => $I18n->getDictionary()));
	}
}