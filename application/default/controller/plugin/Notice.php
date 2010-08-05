<?php
class Notice extends Core_Plugin_Base {
	var $_orderNumber = 6;
	
	function postRoute(){
		$Auth = $this->get('Auth');
		$Router = $this->get('Router');
		$View = $this->get("View");
		
		$type = NULL;
		if (!$Auth->hasIdentity()){
			$noticeCode = 'be_member';
		}
		
		if ($Router->isParam('error')){
			switch ($Router->getParam('error')){
				case 'permission':
				case 'no_user':
				case 'empty_form':
				case 'no_page':
					$noticeCode = $Router->getParam('error');
					$type = 'error';
					break;
				case 'register_ok':
				case 'lyric_ok':
					$noticeCode = $Router->getParam('error');
					$type = 'ok';
					break;
			}
		}
		
		if (isset($noticeCode)){
			$View->setViewParamFromArray(array('noticeCode' => $noticeCode, 'noticeType' => $type));
		}
	}
}