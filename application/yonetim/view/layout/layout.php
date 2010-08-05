
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<!-- saved from url=(0050)http://passatgt.i-host.hu/tf/gray_admin/index.html -->
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">		
	<META name="keywords" content="">
	<META name="description" content="">
	<TITLE>Admin Template</TITLE>
	<?=$this->css("style")?>
</HEAD>
<BODY>
	<DIV id="header">
		<DIV class="col w5 bottomlast">
			<A href="" class="logo">
				<IMG src="<?=$this->imageUrl("logo.gif")?>" alt="Logo">
			</A>
		</DIV>
		<DIV class="col w5 last right bottomlast">
			<P class="last">Logged in as <SPAN class="strong">Admin,</SPAN> <A href="">Logout</A></P>
		</DIV>
		<DIV class="clear"></DIV>
	</DIV>
	<DIV id="wrapper">
		<DIV id="minwidth">
			<DIV id="holder">
				<DIV id="menu">
					<DIV id="left"></DIV>
					<DIV id="right"></DIV>
					<UL>
						<LI class="simple">
							<A href="<?=$this->url("yonetim/")?>" class="selected"><SPAN>Home</SPAN></A>
						</LI><LI class="simple">
							<A href="<?=$this->url("yonetim/album")?>" class="selected"><SPAN>album</SPAN></A>
						</LI><LI class="simple">
							<A href="<?=$this->url("yonetim/artist")?>" class="selected"><SPAN>artist</SPAN></A>
						</LI><LI class="simple">
							<A href="<?=$this->url("yonetim/search")?>" class="selected"><SPAN>search</SPAN></A>
						</LI><LI class="simple">
							<A href="<?=$this->url("yonetim/song")?>" class="selected"><SPAN>song</SPAN></A>
						</LI><LI class="simple">
							<A href="<?=$this->url("yonetim/user")?>" class="selected"><SPAN>user</SPAN></A>
						</LI>
					</UL>
					<DIV class="clear"></DIV>
				</DIV>
					<DIV id="desc">
					<DIV class="body">
						<DIV id="messages"><?=$message?></DIV>
						<DIV class="clear"></DIV>
						<?=$this->content()?>
					</DIV>
					<DIV class="clear"></DIV>
					<DIV id="body_footer">
						<DIV id="bottom_left"></DIV>
					</DIV>
				</DIV>
			</DIV>
		</DIV>
	</DIV>
<DIV id="footer">
	<P class="last">Copyright 2009 - Gray Admin Template - Created by <A href="">Doz</A></P>
	</DIV>

</BODY></HTML>