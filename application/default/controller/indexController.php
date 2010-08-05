<?php
class indexController extends Core_Controller_Base{
	function indexAction(){
		$albums = new album;
		$this->view->albums = $albums->select(NULL,'15', array('artist_id'), array('id', 'DESC'));
		
		$songs = new Song;
		$this->view->songs = $songs->select(NULL, '15', array('artist_id'), array('id', 'DESC'));
		
		$searchClass = new Search;
		$this->view->mp3Searches = $searchClass->select(array('type' => '1'), '75', NULL, array('id', 'DESC'));
		$this->view->lyricSearches = $searchClass->select(array('type' => '2'), '75', NULL, array('id', 'DESC'));
	}
}