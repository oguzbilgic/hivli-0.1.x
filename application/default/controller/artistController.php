<?php
class artistController extends Core_Controller_Base{
	function indexAction(){
		$artists = new artist;
		$this->view->artists = $artists->select(NULL, '45', null, array('id', 'DESC'));
	}
	
	function showAction(){
		$artist = new artist;
		$this->view->artist = $artist->selectOne(array('id' => $this->Router->getParam('id')));
		
		$albums = new album;
		$this->view->albums = $albums->select(array('artist_id' => $this->Router->getParam('id')));
		
		$songs = new Song;
		$this->view->songs = $songs->select(array('artist_id' => $this->Router->getParam('id')));
	}
	
	
}