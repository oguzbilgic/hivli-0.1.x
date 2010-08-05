<?php
class songController extends Core_Controller_Base
{
	function indexAction(){

		$songs = new song;		
		
		if ($this->Router->isParam("filter")){
			$filterField = $this->Router->getParam("filter");
			$select[$filterField] = $this->Router->getParam($filterField);
			$this->view->songs = $songs->select($select);
			$this->view->listHeader = "Filtered By ".$filterField." : ".$this->Router->getParam($filterField);
		} elseif ($this->Router->isParam("search")) {
			$searchField = $this->Router->getParam("search");
			$select[$searchField] = $this->Router->getPost($searchField);
			$this->view->songs = $songs->selectLike($select);
			$this->view->listHeader = "Searched By ".$searchField." : ".$this->Router->getPost($searchField);
		} else {
			$this->view->songs = $songs->select();
			$this->view->listHeader = "List of songs";
		}
	}

	function showAction(){
		$song = new song;
		$song = $song->selectOne(array("id" => $this->Router->getParam("id")), array("user_id" , "album_id" , "artist_id" , null )); 	
		
		$this->view->song = $song;						
	}
	
	function updateAction(){		
			$user = new user;
			$this->view->users = $user->select();		
			$album = new album;
			$this->view->albums = $album->select();		
			$artist = new artist;
			$this->view->artists = $artist->select();
		$song = new song;
		$this->view->song = $song->selectOne(array("id" => $this->Router->getParam("id")));
		
		if($this->Router->hasPost()){
			$song->update(array(
			 "id" => $this->Router->getPost("id")
					    , "name" => $this->Router->getPost("name")
					    , "status" => $this->Router->getPost("status")
					    , "lyric" => $this->Router->getPost("lyric")
					    , "user_id" => $this->Router->getPost("user_id")
					    , "album_id" => $this->Router->getPost("album_id")
					    , "artist_id" => $this->Router->getPost("artist_id")
					    ),
			array("id" => $this->Router->getParam("id")));
			$this->Router->redirect(array("app" => "yonetim", "controller" => "song", "action" => "index", "notice" => "444"));
		}
	}

	function deleteAction(){
		$song = new song;
		$control = $song->selectOne(array("id" => $this->Router->getParam("id")));
		if(isset($control))
		{
			$song->delete(array("id" => $this->Router->getParam("id")));
			$this->Router->redirect(array("app" => "yonetim", "controller" => "song", "action" => "index", "notice" => "111"));
		} else {
			$this->Router->redirect(array("app" => "yonetim", "controller" => "song", "action" => "index", "notice" => "222"));
		}
	}	

		
	function addAction(){		
			$user = new user;
			$this->view->users = $user->select();		
			$album = new album;
			$this->view->albums = $album->select();		
			$artist = new artist;
			$this->view->artists = $artist->select();
		if($this->Router->hasPost()){
			$song = new song;
			$song->add(array( "id" => $this->Router->getPost("id")
					    , "name" => $this->Router->getPost("name")
					    , "status" => $this->Router->getPost("status")
					    , "lyric" => $this->Router->getPost("lyric")
					    , "user_id" => $this->Router->getPost("user_id")
					    , "album_id" => $this->Router->getPost("album_id")
					    , "artist_id" => $this->Router->getPost("artist_id")
					    ));
			$this->Router->redirect(array("app" => "yonetim", "controller" => "song", "action" => "index", "notice" => "333"));
		}
	}
	
}