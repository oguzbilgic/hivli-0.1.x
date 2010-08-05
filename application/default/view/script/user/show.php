<div class="grid_4 aplha" id="box">
	<div class="box">
		<h2><?=$lang['userInfo']?></h2>
		<p><strong><?=$lang['name']?> : </strong><?=$showUser['name']?></p>
		<p><strong><?=$lang['username']?> : </strong><?=$showUser['username']?></p>
	</div>
</div>

<div class="grid_4" id="box">
	<div class="box">
		<h2><?=$lang['lyricsAddedByUser']?></h2>
		<? if (!empty($songs)):?>
			<? foreach($songs as $song):?>
				<p><a href="<?=$this->url('artist/show/id/'.$song['artist_id']['id'].'/'.$song['artist_id']['name'], true)?>"><?=$song['artist_id']['name']?></a> - 
				<a href="<?=$this->url('song/show/id/'.$song['id'].'/'.$song['name'], true)?>"><?=$song['name']?></a></p>
			<? endforeach;?>
		<? else:?>
			<p>Herhangi bir şarkı sözü eklememişsiniz</p>
		<? endif;?>
	</div>
</div>

<div class="grid_4 omega" id="box">
	<div class="box">
		<?=$this->modul('ads/ad_300_250')?>	
	</div>
</div>