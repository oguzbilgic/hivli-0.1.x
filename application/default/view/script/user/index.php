<div class="grid_12" id="box">
	<div class="box">
		<h3><?=$user['name']?></h3>
		<p><strong><?=$lang['username']?> : </strong><?=$user['username']?></p>
		<p><strong>E-Mail : </strong><?=$user['email']?></p>
	</div>
</div>

<div class="grid_12" id="box">
	<div class="box">
		<h3><?=$lang['lyricsAddedByUser']?></h3>
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
