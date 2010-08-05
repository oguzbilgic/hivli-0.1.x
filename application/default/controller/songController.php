<?php
class songController extends Core_Controller_Base{
	var $_loader = array('Auth');
	
	function indexAction(){
		$songs = new song;
		$this->view->songs = $songs->select(NULL, '45', array('artist_id'), array('id', 'DESC'));
	}
	
	function showAction(){
		$song = new Song;
		$this->view->song = $song->selectOne(array('id' => $this->Router->getParam('id')), array('artist_id', 'album_id', 'user_id'));
	}
	
	function updatePostAction(){
		$songClass = new Song;
		$song = $songClass->selectOne(array('id' => $this->Router->getParam('id')), array('artist_id', 'album_id'));
		$this->view->song = $song;
		
		$posts = $this->Router->getPosts();
		
		if (!empty($posts['lyric'])){
			$user = $this->Auth->getIdentityData();
			$lyric = $posts['lyric'];
			$status = ($user['role'] == 'admin') ? '1' : '2' ;
			
			$songClass->update(array('lyric' => $lyric, 'status' => $status, 'user_id' => $user['id']), array('id' => $song['id']));
			$this->Router->redirect(array('action' => 'show', 'id' => $song['id'], 'error' => 'lyric_ok'));
		}
	}
}