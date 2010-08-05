<?php
class albumController extends Core_Controller_Base
{
	function indexAction(){

		$albums = new album;		
		
		if ($this->Router->isParam("filter")){
			$filterField = $this->Router->getParam("filter");
			$select[$filterField] = $this->Router->getParam($filterField);
			$this->view->albums = $albums->select($select);
			$this->view->listHeader = "Filtered By ".$filterField." : ".$this->Router->getParam($filterField);
		} elseif ($this->Router->isParam("search")) {
			$searchField = $this->Router->getParam("search");
			$select[$searchField] = $this->Router->getPost($searchField);
			$this->view->albums = $albums->selectLike($select);
			$this->view->listHeader = "Searched By ".$searchField." : ".$this->Router->getPost($searchField);
		} else {
			$this->view->albums = $albums->select();
			$this->view->listHeader = "List of albums";
		}
	}

	function showAction(){
		$album = new album;
		$album = $album->selectOne(array("id" => $this->Router->getParam("id")), array("artist_id" , null )); 		
				$songs = new song;
				$this->view->songs = $songs->select(array("album_id" => $album["id"]));	
		
		$this->view->album = $album;						
	}
	
	function updateAction(){		
			$artist = new artist;
			$this->view->artists = $artist->select();
		$album = new album;
		$this->view->album = $album->selectOne(array("id" => $this->Router->getParam("id")));
		
		if($this->Router->hasPost()){
			$album->update(array(
			 "id" => $this->Router->getPost("id")
					    , "name" => $this->Router->getPost("name")
					    , "artist_id" => $this->Router->getPost("artist_id")
					    ),
			array("id" => $this->Router->getParam("id")));
			$this->Router->redirect(array("app" => "yonetim", "controller" => "album", "action" => "index", "notice" => "444"));
		}
	}

	function deleteAction(){
		$album = new album;
		$control = $album->selectOne(array("id" => $this->Router->getParam("id")));
		if(isset($control))
		{
			$album->delete(array("id" => $this->Router->getParam("id")));
			$this->Router->redirect(array("app" => "yonetim", "controller" => "album", "action" => "index", "notice" => "111"));
		} else {
			$this->Router->redirect(array("app" => "yonetim", "controller" => "album", "action" => "index", "notice" => "222"));
		}
	}	

		
	function addAction(){		
			$artist = new artist;
			$this->view->artists = $artist->select();
		if($this->Router->hasPost()){
			$album = new album;
			$album->add(array( "id" => $this->Router->getPost("id")
					    , "name" => $this->Router->getPost("name")
					    , "artist_id" => $this->Router->getPost("artist_id")
					    ));
			$this->Router->redirect(array("app" => "yonetim", "controller" => "album", "action" => "index", "notice" => "333"));
		}
	}
	
}