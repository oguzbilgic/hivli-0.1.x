	<div class="grid_8 aplha" id="box">
	  <div class="box">
			<h2><?=$lang['songs'] ?></h2>
			<? foreach($songs as $song):?>
				<p><a href="<?=$this->url('artist/show/id/'.$song['artist_id']['id'].'/'.$song['artist_id']['name'], true)?>"><?=$song['artist_id']['name']?></a> - 
				<a href="<?=$this->url('song/show/id/'.$song['id'].'/'.$song['name'], true)?>"><?=$song['name']?></a></p>
			<? endforeach;?>
	  </div>
	</div>



	<div class="grid_4 omega" id="box">
		<div class="box">
			<?=$this->modul('ads/ad_300_250')?>
		</div>
	</div>
