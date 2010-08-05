<div class="grid_4 aplha" id="box">
	<h2><?=$artist['name']?> <?=$lang['albums']?></h2>
	<? foreach($albums as $album):?>
		<p><a href="<?=$this->url('artist/show/id/'.$artist['id'].'/'.$artist['name'], true)?>"><?=$artist['name']?></a> - 
			<a href="<?=$this->url('album/show/id/'.$album['id'].'/'.$album['name'], true)?>"><?=$album['name']?></a></p>
	<? endforeach;?>
</div>

<div class="grid_4" id="box">
	<h2><?=$artist['name']?> <?=$lang['songs']?></h2>
	<? foreach($songs as $song):?>
		<p><a href="<?=$this->url('artist/show/id/'.$artist['id'].'/'.$artist['name'], true)?>"><?=$artist['name']?></a> - 
			<a href="<?=$this->url('song/show/id/'.$song['id'].'/'.$song['name'], true)?>"><?=$song['name']?></a></p>
	<? endforeach;?>
</div>

<div class="grid_4 omega" id="box">
	<?=$this->modul('ads/ad_300_250')?>
</div>
