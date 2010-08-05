<div class="grid_12">
	<div id="navigation">
		<a href="<?=$this->url('')?>"><?=$lang['homePage']?></a>
		<a href="<?=$this->url('album/')?>"><?=$lang['albums']?></a>
		<a href="<?=$this->url('artist/')?>"><?=$lang['artists']?></a>
		<a href="<?=$this->url('song/')?>"><?=$lang['songs']?></a>
		<? if (isset($user)):?>
			<? if ($user['role'] == 'admin'):?>
				<a href="<?=$this->url('yonetim')?>"><?=$lang['backend']?></a>
				<a href="<?=$this->url('statics')?>"><?=$lang['statics']?></a>
			<? endif;?>
			<a href="<?=$this->url('user')?>"><?=$lang['myAccount']?></a>
			<a href="<?=$this->url('user/logout')?>"><?=$lang['logout']?></a>
			<p><?=$lang['hello']?> <?=$user['name']?></p>
		<? else: ?>
			<a href="<?=$this->url('user/login')?>"><?=$lang['login']?></a>
		<? endif; ?>
	</div>
</div>
	