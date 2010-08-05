<?php
class userController extends Core_Controller_Base{
	var $_loader = array('Auth');
	
	function indexAction(){
		$user = $this->Auth->getIdentityData();
		$songClass = new Song;
		$songs = $songClass->select(array('user_id' => $user['id']), NULL, array('artist_id'));
		$this->view->songs = $songs;
	}
	
	function showAction(){
		$userClass = new User;
		$showUser = $userClass->selectOne(array('id' => $this->Router->getParam('id')));
		$songClass = new Song;
		$songs = $songClass->select(array('user_id' => $showUser['id']), NULL, array('artist_id'));
		$this->view->songs = $songs;
		$this->view->showUser = $showUser;
	}
	
	function registerAction(){
		$post = $this->Router->getPosts();
		if (!empty($post['username']) && !empty($post['password']) && !empty($post['name']) && !empty($post['email'])){
			$user = new user;
			$user->add(array('username' => $post['username'], 
							 'password' => $post['password'], 
							 'name' => $post['name'], 
							 'email' => $post['email'], 
							 'date_added' => time(), 
							 'role' => 'user'));
			$this->Router->redirect(array('action' => 'login', 'error' => 'register_ok'));
		} else {
			$this->Router->redirect(array('action' => 'login', 'error' => 'empty_form'));
		}
	}
	
	function loginAction(){
		if ($this->Auth->hasIdentity()){
			$this->Router->redirect(array('action' => 'index'));	
		}
		
		$post = $this->Router->getPosts();
		if (!empty($post['username']) && !empty($post['password'])){
			$user = new User;
			$result = $user->selectOne(array('username' => $post['username'], 
											 'password' => $post['password']));
			if ($result){
				$this->Auth->createIdentity($result['id']);
				$this->Router->redirect(array('action' => 'index'));		
			} else {
				$this->Router->redirect(array('action' => 'login', 'error' => 'no_user'));
			}
		}
	}
	
	function logoutAction(){
		$this->Auth->clearIdentity();
		$this->Router->redirect(array('action' => 'login'));
	}
}