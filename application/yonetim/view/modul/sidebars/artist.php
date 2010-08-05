	
	<DIV class="col w2">
	<DIV class="content">
		<DIV class="box header">
			<DIV class="head">
				<DIV></DIV>
			</DIV>
			<H2>Tools</H2>
			<DIV class="desc">
				<P><a href="<?=$this->url("yonetim/artist/add")?>" class="icon add modal" >Create New artist</a></P><? if (isset($artist)): ?> 
	
	<P><a class="icon pencil" href="<?=$this->url("yonetim/artist/update/id/".$artist["id"])?>">Edit</a></P> 
	<P><a class="icon delete" href="<?=$this->url("yonetim/artist/delete/id/".$artist["id"])?>">Delete</a></P>
		
	<? endif; ?>
	</DIV>
			<DIV class="bottom">
				<DIV></DIV>
			</DIV>
		</DIV>		
				<DIV class="box header">
				<DIV class="head">
					<DIV></DIV>
				</DIV>
				<H2>Search by name</H2>
				<DIV class="desc">
					<form method ="post" action="<?=$this->url("yonetim/artist/index/search/name")?>">
					<p><label for="simple_input">name:</label></p>
					<p><input type="text"  class="text" name="name" /></p><br />
					<p><input type="submit" value="Submit" class="button form_submit" /></p>
					</form>
				</DIV>
				<DIV class="bottom">
					<DIV></DIV>
				</DIV>
			</DIV>
				
<?if (isset($artists)) : ?>
<DIV class="box header">
			<DIV class="head">
				<DIV></DIV>
			</DIV>
			<H2>Statics</H2>
			<DIV class="desc">
				<P><span  class="icon add chart_bar" > Number: <?=count($artists)?></span></P>
				</DIV>
			<DIV class="bottom">
				<DIV></DIV>
			</DIV>
		</DIV>
<? endif;?>
				
	</DIV>
</DIV>	