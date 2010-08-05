<div class="grid_8 aplha" id="box">
	<h2><?=$lang['latestAlbums']?></h2>
	<? foreach($albums as $album):?>
		<p><a href="<?=$this->url('artist/show/id/'.$album['artist_id']['id'].'/'.$album['artist_id']['name'], true)?>"><?=$album['artist_id']['name']?></a> - 
			<a href="<?=$this->url('album/show/id/'.$album['id'].'/'.$album['name'], true)?>"><?=$album['name']?></a></p>
	<? endforeach;?>
</div>

<div class="grid_4 omega" id="box">
	<?=$this->modul('ads/ad_300_250')?>
</div>
