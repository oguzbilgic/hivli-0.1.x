<div class="grid_8" id="box">
	<? foreach($searchs as $search):?>
		<? if($search['type'] == '1'):?>
			<p><a href="<?=$this->url('mp3/'.$search['id'].'/'.$search['string'], true)?>"><?=$search['string']?></a></p>
		<? elseif ($search['type'] == '2' ): ?>
			<p><a href="<?=$this->url('lyric/'.$search['id'].'/'.$search['string'], true)?>"><?=$search['string']?></a></p>
		<? endif;?>	
	<? endforeach;?>
</div>

<div class="grid_4" id="box">
	<?=$this->modul('ads/ad_300_250')?>
	<?=$this->modul('ads/ad_300_250')?>
</div>
