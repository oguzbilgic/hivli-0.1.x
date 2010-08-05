<div class="grid_4 aplha" id="box">
	<h2><?=$album['name']?></h2>
	<p><strong><?=$lang['artist']?> : </strong><a href="<?=$this->url('artist/show/id/'.$album['artist_id']['id'].'/'.$album['artist_id']['name'], true)?>"><?=$album['artist_id']['name']?></a></p>
</div>

<div class="grid_4" id="box">
	<h2><?=$lang['songInThis']?></h2>
	<? foreach($songs as $song):?>
		<p><a href="<?=$this->url('song/show/id/'.$song['id'].'/'.$song['name'], true)?>"><?=$song['name']?></a></p>
	<? endforeach;?>
</div>

<div class="grid_4 omega" id="box">
	<?=$this->modul('ads/ad_300_250')?>
</div>
