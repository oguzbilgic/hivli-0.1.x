<?php
class userController extends Core_Controller_Base
{
	function indexAction(){

		$users = new user;		
		
		if ($this->Router->isParam("filter")){
			$filterField = $this->Router->getParam("filter");
			$select[$filterField] = $this->Router->getParam($filterField);
			$this->view->users = $users->select($select);
			$this->view->listHeader = "Filtered By ".$filterField." : ".$this->Router->getParam($filterField);
		} elseif ($this->Router->isParam("search")) {
			$searchField = $this->Router->getParam("search");
			$select[$searchField] = $this->Router->getPost($searchField);
			$this->view->users = $users->selectLike($select);
			$this->view->listHeader = "Searched By ".$searchField." : ".$this->Router->getPost($searchField);
		} else {
			$this->view->users = $users->select();
			$this->view->listHeader = "List of users";
		}
	}

	function showAction(){
		$user = new user;
		$user = $user->selectOne(array("id" => $this->Router->getParam("id")), array(null )); 	
		
		$this->view->user = $user;						
	}
	
	function updateAction(){
		$user = new user;
		$this->view->user = $user->selectOne(array("id" => $this->Router->getParam("id")));
		
		if($this->Router->hasPost()){
			$user->update(array(
			 "id" => $this->Router->getPost("id")
					    , "username" => $this->Router->getPost("username")
					    , "password" => $this->Router->getPost("password")
					    , "name" => $this->Router->getPost("name")
					    , "date_added" => mktime(
											$this->Router->getPost("date_added_Ho"),
											$this->Router->getPost("date_added_Mi"),
											"00",
											$this->Router->getPost("date_added_Mo"),
											$this->Router->getPost("date_added_Da"),
											$this->Router->getPost("date_added_Ye")
											
				)
					    , "email" => $this->Router->getPost("email")
					    , "role" => $this->Router->getPost("role")
					    ),
			array("id" => $this->Router->getParam("id")));
			$this->Router->redirect(array("app" => "yonetim", "controller" => "user", "action" => "index", "notice" => "444"));
		}
	}

	function deleteAction(){
		$user = new user;
		$control = $user->selectOne(array("id" => $this->Router->getParam("id")));
		if(isset($control))
		{
			$user->delete(array("id" => $this->Router->getParam("id")));
			$this->Router->redirect(array("app" => "yonetim", "controller" => "user", "action" => "index", "notice" => "111"));
		} else {
			$this->Router->redirect(array("app" => "yonetim", "controller" => "user", "action" => "index", "notice" => "222"));
		}
	}	

		
	function addAction(){
		if($this->Router->hasPost()){
			$user = new user;
			$user->add(array( "id" => $this->Router->getPost("id")
					    , "username" => $this->Router->getPost("username")
					    , "password" => $this->Router->getPost("password")
					    , "name" => $this->Router->getPost("name")
					    , "date_added" => mktime(
											$this->Router->getPost("date_added_Ho"),
											$this->Router->getPost("date_added_Mi"),
											"00",
											$this->Router->getPost("date_added_Mo"),
											$this->Router->getPost("date_added_Da"),
											$this->Router->getPost("date_added_Ye")
											
				)
					    , "email" => $this->Router->getPost("email")
					    , "role" => $this->Router->getPost("role")
					    ));
			$this->Router->redirect(array("app" => "yonetim", "controller" => "user", "action" => "index", "notice" => "333"));
		}
	}
	
}