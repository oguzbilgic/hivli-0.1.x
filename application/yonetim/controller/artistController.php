<?php
class artistController extends Core_Controller_Base
{
	function indexAction(){

		$artists = new artist;		
		
		if ($this->Router->isParam("filter")){
			$filterField = $this->Router->getParam("filter");
			$select[$filterField] = $this->Router->getParam($filterField);
			$this->view->artists = $artists->select($select);
			$this->view->listHeader = "Filtered By ".$filterField." : ".$this->Router->getParam($filterField);
		} elseif ($this->Router->isParam("search")) {
			$searchField = $this->Router->getParam("search");
			$select[$searchField] = $this->Router->getPost($searchField);
			$this->view->artists = $artists->selectLike($select);
			$this->view->listHeader = "Searched By ".$searchField." : ".$this->Router->getPost($searchField);
		} else {
			$this->view->artists = $artists->select();
			$this->view->listHeader = "List of artists";
		}
	}

	function showAction(){
		$artist = new artist;
		$artist = $artist->selectOne(array("id" => $this->Router->getParam("id")), array(null )); 		
				$albums = new album;
				$this->view->albums = $albums->select(array("artist_id" => $artist["id"]));	
		
		$this->view->artist = $artist;						
	}
	
	function updateAction(){
		$artist = new artist;
		$this->view->artist = $artist->selectOne(array("id" => $this->Router->getParam("id")));
		
		if($this->Router->hasPost()){
			$artist->update(array(
			 "id" => $this->Router->getPost("id")
					    , "name" => $this->Router->getPost("name")
					    ),
			array("id" => $this->Router->getParam("id")));
			$this->Router->redirect(array("app" => "yonetim", "controller" => "artist", "action" => "index", "notice" => "444"));
		}
	}

	function deleteAction(){
		$artist = new artist;
		$control = $artist->selectOne(array("id" => $this->Router->getParam("id")));
		if(isset($control))
		{
			$artist->delete(array("id" => $this->Router->getParam("id")));
			$this->Router->redirect(array("app" => "yonetim", "controller" => "artist", "action" => "index", "notice" => "111"));
		} else {
			$this->Router->redirect(array("app" => "yonetim", "controller" => "artist", "action" => "index", "notice" => "222"));
		}
	}	

		
	function addAction(){
		if($this->Router->hasPost()){
			$artist = new artist;
			$artist->add(array( "id" => $this->Router->getPost("id")
					    , "name" => $this->Router->getPost("name")
					    ));
			$this->Router->redirect(array("app" => "yonetim", "controller" => "artist", "action" => "index", "notice" => "333"));
		}
	}
	
}