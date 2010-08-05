<?php if (isset($error)):?>
	<div class="grid_12" id="box">
		<div class="notice" >
			<p><?=$error?></p>
		</div>
	</div>
<?php endif;?>

<div class="grid_4 aplha" id="box">
	<div class="box">
		<h2><?=$lang['login']?></h2>
		<form method="post" action="">
			<label><?=$lang['username']?> : </label>
			<input type="text"  name="username">
			<label><?=$lang['password']?> : </label>
			<input type="password"  name="password">
			<input  type="submit" value="Giriş" class="button">
		</form>
		
	</div>
</div>

<div class="grid_4" id="box">
	<div class="box">
		<h2><?=$lang['register']?></h2>
		<form method="post" action="<?=$this->url('user/register')?>">
			<label><?=$lang['name']?> : </label>
			<input type="text"  name="name">
			<label>E-Mail : </label>
			<input type="text"  name="email">
			<label><?=$lang['username']?> : </label>
			<input type="text"  name="username">
			<label><?=$lang['password']?> : </label>
			<input type="password"  name="password">
			<input class="button" type="submit" value="<?=$lang['register']?>">
		</form>
	</div>
</div>

<div class="grid_4 omega" id="box">
	<div class="box">
		<?=$this->modul('ads/ad_300_250')?>	
	</div>
</div>