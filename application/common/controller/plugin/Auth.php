<?php
class Auth extends Core_Plugin_Base {
	var $_orderNumber = 1;
	
	function postRoute(){
		$Auth = $this->get('Auth');
		$Router = $this->get('Router');
		$View = $this->get("View");
		
		if ($Auth->isActive()){
			if ($Auth->hasIdentity()){
				$user = new User;
				$userData = $user->selectOne(array('id' => $Auth->getIdentity()));
				
				$Auth->recordIdentityData($userData);
				$Auth->setRole($userData['role']);
				$View->setViewParamFromArray(array('user' => $userData));
			}
				
			if (!$Auth->isAllowed($Router->getControllerName(), $Router->getActionName())){
				$Router->redirect(array('app' => 'default', 'controller' => 'index', 'action' => 'index', 'error' => 'empty_form'));
			}
		}
	}
}