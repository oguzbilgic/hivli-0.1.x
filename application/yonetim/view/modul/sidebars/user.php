	
	<DIV class="col w2">
	<DIV class="content">
		<DIV class="box header">
			<DIV class="head">
				<DIV></DIV>
			</DIV>
			<H2>Tools</H2>
			<DIV class="desc">
				<P><a href="<?=$this->url("yonetim/user/add")?>" class="icon add modal" >Create New user</a></P><? if (isset($user)): ?> 
	
	<P><a class="icon pencil" href="<?=$this->url("yonetim/user/update/id/".$user["id"])?>">Edit</a></P> 
	<P><a class="icon delete" href="<?=$this->url("yonetim/user/delete/id/".$user["id"])?>">Delete</a></P>
		
	<? endif; ?>
	</DIV>
			<DIV class="bottom">
				<DIV></DIV>
			</DIV>
		</DIV>
<?if (isset($users)) : ?>
<DIV class="box header">
			<DIV class="head">
				<DIV></DIV>
			</DIV>
			<H2>Statics</H2>
			<DIV class="desc">
				<P><span  class="icon add chart_bar" > Number: <?=count($users)?></span></P>
				</DIV>
			<DIV class="bottom">
				<DIV></DIV>
			</DIV>
		</DIV>
<? endif;?>
				
	</DIV>
</DIV>	