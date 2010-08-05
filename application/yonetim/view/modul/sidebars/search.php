	
	<DIV class="col w2">
	<DIV class="content">
		<DIV class="box header">
			<DIV class="head">
				<DIV></DIV>
			</DIV>
			<H2>Tools</H2>
			<DIV class="desc">
				<P><a href="<?=$this->url("yonetim/search/add")?>" class="icon add modal" >Create New search</a></P><? if (isset($search)): ?> 
	
	<P><a class="icon pencil" href="<?=$this->url("yonetim/search/update/id/".$search["id"])?>">Edit</a></P> 
	<P><a class="icon delete" href="<?=$this->url("yonetim/search/delete/id/".$search["id"])?>">Delete</a></P>
		
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
				<H2>Filter by type</H2>
				<DIV class="desc"><P><a class="icon tag_red" href="<?=$this->url("yonetim/search")?>">All</a></P><P><a class="icon tag_orange" href="<?=$this->url("yonetim/search/index/filter/type/type/1")?>">Mp3</a></P><P><a class="icon tag_orange" href="<?=$this->url("yonetim/search/index/filter/type/type/2")?>">Lyric</a></P></DIV>
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
					<form method ="post" action="<?=$this->url("yonetim/search/index/search/name")?>">
					<p><label for="simple_input">name:</label></p>
					<p><input type="text"  class="text" name="name" /></p><br />
					<p><input type="submit" value="Submit" class="button form_submit" /></p>
					</form>
				</DIV>
				<DIV class="bottom">
					<DIV></DIV>
				</DIV>
			</DIV>
				
<?if (isset($searchs)) : ?>
<DIV class="box header">
			<DIV class="head">
				<DIV></DIV>
			</DIV>
			<H2>Statics</H2>
			<DIV class="desc">
				<P><span  class="icon add chart_bar" > Number: <?=count($searchs)?></span></P>
				</DIV>
			<DIV class="bottom">
				<DIV></DIV>
			</DIV>
		</DIV>
<? endif;?>
				
	</DIV>
</DIV>	