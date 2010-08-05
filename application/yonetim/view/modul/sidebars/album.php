	
	<DIV class="col w2">
	<DIV class="content">
		<DIV class="box header">
			<DIV class="head">
				<DIV></DIV>
			</DIV>
			<H2>Tools</H2>
			<DIV class="desc">
				<P><a href="<?=$this->url("yonetim/album/add")?>" class="icon add modal" >Create New album</a></P><? if (isset($album)): ?> 
	
	<P><a class="icon pencil" href="<?=$this->url("yonetim/album/update/id/".$album["id"])?>">Edit</a></P> 
	<P><a class="icon delete" href="<?=$this->url("yonetim/album/delete/id/".$album["id"])?>">Delete</a></P>
		
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
					<form method ="post" action="<?=$this->url("yonetim/album/index/search/name")?>">
					<p><label for="simple_input">name:</label></p>
					<p><input type="text"  class="text" name="name" /></p><br />
					<p><input type="submit" value="Submit" class="button form_submit" /></p>
					</form>
				</DIV>
				<DIV class="bottom">
					<DIV></DIV>
				</DIV>
			</DIV>
				
<?if (isset($albums)) : ?>
<DIV class="box header">
			<DIV class="head">
				<DIV></DIV>
			</DIV>
			<H2>Statics</H2>
			<DIV class="desc">
				<P><span  class="icon add chart_bar" > Number: <?=count($albums)?></span></P>
				</DIV>
			<DIV class="bottom">
				<DIV></DIV>
			</DIV>
		</DIV>
<? endif;?>
				
	</DIV>
</DIV>	