<div class="grid_8 aplha" id="box">
	<h2><?=$lang['artists']?></h2>
	<? foreach($artists as $artist):?>
		<p><a href="<?=$this->url('artist/show/id/'.$artist['id'].'/'.$artist['name'], true)?>"><?=$artist['name']?></a></p>
	<? endforeach;?>
</div>

<div class="grid_4 omega" id="box">
	<?=$this->modul('ads/ad_300_250')?>
</div>
