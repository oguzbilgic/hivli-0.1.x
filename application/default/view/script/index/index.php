<div class="grid_4 aplha" id="box">
	<h2><?=$lang['latestAlbums']?></h2>
	<? foreach($albums as $album):?>
		<p><a href="<?=$this->url('artist/show/id/'.$album['artist_id']['id'].'/'.$album['artist_id']['name'], true)?>"><?=$album['artist_id']['name']?></a> - 
			<a href="<?=$this->url('album/show/id/'.$album['id'].'/'.$album['name'], true)?>"><?=$album['name']?></a></p>
	<? endforeach;?>
</div>

<div class="grid_4" id="box">
	<h2><?=$lang['latestSongs']?></h2>
	<? foreach($songs as $song):?>
		<p><a href="<?=$this->url('artist/show/id/'.$song['artist_id']['id'].'/'.$song['artist_id']['name'], true)?>"><?=$song['artist_id']['name']?></a> - 
		<a href="<?=$this->url('song/show/id/'.$song['id'].'/'.$song['name'], true)?>"><?=$song['name']?></a></p>
	<? endforeach;?>
</div>

<div class="grid_4 omega" id="box">
	<?=$this->modul('ads/ad_300_250')?>
</div>

<div class="grid_12" id="box">
	<h2><?=$lang['latestMp3s']?></h2>
	<? foreach($mp3Searches as $search):?>
		<? if ($search['type'] == "1"):?>
			<a href="<?=$this->url('mp3/'.$search['id'].'/'.$search['string'], TRUE)?>"><?=$search['string']?></a> , 
		<? endif;?>
	<? endforeach;?>
</div>

<div class="grid_12" id="box">
	<h2><?=$lang['latestLyrics']?></h2>
	<? foreach($lyricSearches as $search):?>
		<? if ($search['type'] == "2"):?>
			<a href="<?=$this->url('lyric/'.$search['id'].'/'.$search['string'], TRUE)?>"><?=$search['string']?></a> , 
		<? endif;?>
	<? endforeach;?>
</div>