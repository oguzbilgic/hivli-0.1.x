	
	<DIV class="col w2">
	<DIV class="content">
		<DIV class="box header">
			<DIV class="head">
				<DIV></DIV>
			</DIV>
			<H2>Tools</H2>
			<DIV class="desc">
				<P><a href="<?=$this->url("yonetim/song/add")?>" class="icon add modal" >Create New song</a></P><? if (isset($song)): ?> 
	
	<P><a class="icon pencil" href="<?=$this->url("yonetim/song/update/id/".$song["id"])?>">Edit</a></P> 
	<P><a class="icon delete" href="<?=$this->url("yonetim/song/delete/id/".$song["id"])?>">Delete</a></P>
		
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
				<H2>Filter by status</H2>
				<DIV class="desc"><P><a class="icon tag_red" href="<?=$this->url("yonetim/song")?>">All</a></P><P><a class="icon tag_orange" href="<?=$this->url("yonetim/song/index/filter/status/status/1")?>">Onaylı</a></P><P><a class="icon tag_orange" href="<?=$this->url("yonetim/song/index/filter/status/status/2")?>">Onay Bekliyor</a></P></DIV>
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
					<form method ="post" action="<?=$this->url("yonetim/song/index/search/name")?>">
					<p><label for="simple_input">name:</label></p>
					<p><input type="text"  class="text" name="name" /></p><br />
					<p><input type="submit" value="Submit" class="button form_submit" /></p>
					</form>
				</DIV>
				<DIV class="bottom">
					<DIV></DIV>
				</DIV>
			</DIV>
				
<?if (isset($songs)) : ?>
<DIV class="box header">
			<DIV class="head">
				<DIV></DIV>
			</DIV>
			<H2>Statics</H2>
			<DIV class="desc">
				<P><span  class="icon add chart_bar" > Number: <?=count($songs)?></span></P>
				</DIV>
			<DIV class="bottom">
				<DIV></DIV>
			</DIV>
		</DIV>
<? endif;?>
				
	</DIV>
</DIV>	