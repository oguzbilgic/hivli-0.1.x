<?php
class Meta extends Core_Plugin_Base {
	var $_orderNumber = 7;
	
	function preRender(){
		$Router = $this->get('Router');
		$View = $this->get("View");
		$I18n = $this->get("I18n");
		
		$page = $Router->getParam('controller').'_'.$Router->getParam('action');
		$dictionary = $I18n->getDictionary();
		
		$title = $dictionary['meta_title'];
		$desc = $dictionary['meta_desc'];
		$keyword = $dictionary['meta_keyword'];
		
		switch ($page){
			case 'album_index':
			case 'artist_index':
			case 'song_index':
			case 'index_index':
				$title = $dictionary[$page.'_meta_title'].' - '.$dictionary['meta_title'];
				$desc = $dictionary[$page.'_meta_desc'];
				$keyword = $dictionary[$page.'_meta_keyword'];
				break;
			case 'album_show':
				$album = $View->getParam('album');
				$title = $View->fill(array('album' => $album['name'], 'artist' => $album['artist_id']['name']), $dictionary['album_show_meta_title']);
				$desc = $View->fill(array('album' => $album['name'], 'artist' => $album['artist_id']['name']), $dictionary['album_show_meta_desc']);
				$keyword = $View->fill(array('album' => $album['name'], 'artist' => $album['artist_id']['name']), $dictionary['album_show_meta_keyword']);
				break;
			case 'artist_show':
				$artist = $View->getParam('artist');
				$title = $View->fill(array('artist' => $artist['name']), $dictionary['artist_show_meta_title']);
				$desc = $View->fill(array('artist' => $artist['name']), $dictionary['artist_show_meta_desc']);
				$keyword = $View->fill(array('artist' => $artist['name']), $dictionary['artist_show_meta_keyword']);
				break;
			case 'song_show':
				$song = $View->getParam('song');
				$title = $View->fill(array('artist' => $song['artist_id']['name'], 'song' => $song['name']), $dictionary['song_show_meta_title']);
				$desc = $View->fill(array('artist' => $song['artist_id']['name'], 'song' => $song['name']), $dictionary['song_show_meta_desc']);
				$keyword = $View->fill(array('artist' => $song['artist_id']['name'], 'song' => $song['name']), $dictionary['song_show_meta_keyword']);
				break;
			case 'search_show':
				$search = $View->getParam('search');
				if ($search['type'] == '1'){
					$title = $View->fill(array('string' => $search['string']), $dictionary['search_show_meta_title_m']).$dictionary['meta_title'];
					$desc = $View->fill(array('string' => $search['string']), $dictionary['search_show_meta_desc_m']);
					$keyword = $View->fill(array('string' => $search['string']), $dictionary['search_show_meta_keyword_m']);
				} elseif ($search['type'] == '2') {
					$title = $View->fill(array('string' => $search['string']), $dictionary['search_show_meta_title_l']).$dictionary['meta_title'];
					$desc = $View->fill(array('string' => $search['string']), $dictionary['search_show_meta_desc_l']);
					$keyword = $View->fill(array('string' => $search['string']), $dictionary['search_show_meta_keyword_l']);
				}
				break;
		}
		
		$View->setViewParamFromArray(array('title' => $title, 'desc' => $desc, 'keyword' => $keyword));
	}
}