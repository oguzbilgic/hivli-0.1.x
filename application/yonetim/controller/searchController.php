<?php
class searchController extends Core_Controller_Base
{
	function indexAction(){

		$searchs = new search;		
		
		if ($this->Router->isParam("filter")){
			$filterField = $this->Router->getParam("filter");
			$select[$filterField] = $this->Router->getParam($filterField);
			$this->view->searchs = $searchs->select($select);
			$this->view->listHeader = "Filtered By ".$filterField." : ".$this->Router->getParam($filterField);
		} elseif ($this->Router->isParam("search")) {
			$searchField = $this->Router->getParam("search");
			$select[$searchField] = $this->Router->getPost($searchField);
			$this->view->searchs = $searchs->selectLike($select);
			$this->view->listHeader = "Searched By ".$searchField." : ".$this->Router->getPost($searchField);
		} else {
			$this->view->searchs = $searchs->select();
			$this->view->listHeader = "List of searchs";
		}
	}

	function showAction(){
		$search = new search;
		$search = $search->selectOne(array("id" => $this->Router->getParam("id")), array(null )); 	
		
		$this->view->search = $search;						
	}
	
	function updateAction(){
		$search = new search;
		$this->view->search = $search->selectOne(array("id" => $this->Router->getParam("id")));
		
		if($this->Router->hasPost()){
			$search->update(array(
			 "id" => $this->Router->getPost("id")
					    , "string" => $this->Router->getPost("string")
					    , "date_added" => mktime(
											$this->Router->getPost("date_added_Ho"),
											$this->Router->getPost("date_added_Mi"),
											"00",
											$this->Router->getPost("date_added_Mo"),
											$this->Router->getPost("date_added_Da"),
											$this->Router->getPost("date_added_Ye")
											
				)
					    , "ip" => $this->Router->getPost("ip")
					    , "type" => $this->Router->getPost("type")
					    ),
			array("id" => $this->Router->getParam("id")));
			$this->Router->redirect(array("app" => "yonetim", "controller" => "search", "action" => "index", "notice" => "444"));
		}
	}

	function deleteAction(){
		$search = new search;
		$control = $search->selectOne(array("id" => $this->Router->getParam("id")));
		if(isset($control))
		{
			$search->delete(array("id" => $this->Router->getParam("id")));
			$this->Router->redirect(array("app" => "yonetim", "controller" => "search", "action" => "index", "notice" => "111"));
		} else {
			$this->Router->redirect(array("app" => "yonetim", "controller" => "search", "action" => "index", "notice" => "222"));
		}
	}	

		
	function addAction(){
		if($this->Router->hasPost()){
			$search = new search;
			$search->add(array( "id" => $this->Router->getPost("id")
					    , "string" => $this->Router->getPost("string")
					    , "date_added" => mktime(
											$this->Router->getPost("date_added_Ho"),
											$this->Router->getPost("date_added_Mi"),
											"00",
											$this->Router->getPost("date_added_Mo"),
											$this->Router->getPost("date_added_Da"),
											$this->Router->getPost("date_added_Ye")
											
				)
					    , "ip" => $this->Router->getPost("ip")
					    , "type" => $this->Router->getPost("type")
					    ));
			$this->Router->redirect(array("app" => "yonetim", "controller" => "search", "action" => "index", "notice" => "333"));
		}
	}
	
}