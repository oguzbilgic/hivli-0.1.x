<?php
class searchController extends Core_Controller_Base{
	var $_loader = array('Auth');
	
	function searchPostAction(){
		$post = $this->Router->getPosts();
		if (!empty($post['string']) && !empty($post['type'])){
			$search = new Search;
			$search->add(array('string' => $this->Router->getPost('string'), 
							   'type' => $this->Router->getPost('type'),
							   'date_added' => time(),
							   'ip' => $_SERVER['REMOTE_ADDR']));
			$newSearch = $search->selectOne(array('string' => $this->Router->getPost('string'), 
							   'type' => $this->Router->getPost('type'),
							   'date_added' => time()));
			$this->Router->redirect(array('action' => 'show', 'id' => $newSearch['id']));
		} else {
			$this->Router->redirect(array('controller' => 'index', 'action' => 'index', 'error' => 'empty_form'));
		}
	}
	
	function showAction(){
		if ($this->Router->isParam('redirect')){
			$search = array('string' => str_replace('-', ' ', $this->Router->getParam('string')), 'type' => '1');
		} else {
			$searchClass = new Search;
			$search = $searchClass->selectOne(array('id' => $this->Router->getParam('id')));	
		}
		
		$this->view->search = $search;
	}
	
	function listAction(){
		$searchs = new Search;
		$this->view->searchs = $searchs->select(NULL, NULL, NULL, array('id', 'DESC'));
	}
	
}