<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<?=$this->modul('layout/meta')?>
	<?=$this->css('960')?>
	<?=$this->css('text')?>
	<?=$this->css('reset')?>
	<?=$this->css('style')?>
	<?=$this->modul('layout/analytics')?>
</head>
<body>
<div class="container_12" >
	<div class="grid_7 aplha" id="box">
		<img src="<?=$this->imageUrl('logo.jpg')?>" alt="logo" />
	</div>
	
	<?=$this->modul('layout/langbar')?>
	<?=$this->modul('layout/navigation')?>
	<?=$this->modul('layout/search_form')?>
	<?=$this->modul('layout/notice')?>

	<div class="grid_12" id="box">
		<?=$this->modul('ads/ad_728_90')?>
	</div>
	
	<?=$this->content()?>

	<div class="grid_12" id="box">
		<?=$this->modul('ads/adtech_728_90')?>
	</div>
	
	<div class="grid_12" id="footer">
		<p><a href="<?=$this->url('search/list')?>">Links</a></p>
		<p><?=$lang['footer']?></p>
		<p><?=$this->modul('layout/analytics_footer')?></p>
	</div>
</div>
</body>
</html>