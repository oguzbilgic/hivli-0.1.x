<?php
class albumController extends Core_Controller_Base{
	
	function indexAction(){
		$albums = new album;
		$this->view->albums = $albums->select(NULL, '45', array('artist_id'), array('id', 'DESC'));		
	}
	
	function showAction(){
		$album = new album;
		$this->view->album = $album->selectOne(array('id' => $this->Router->getParam('id')), array('artist_id'));
		
		$songs = new Song;
		$this->view->songs = $songs->select(array('album_id' => $this->Router->getParam('id')));
	}
}