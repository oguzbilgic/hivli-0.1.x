<?php

function createBackendLayout($appName)
{
	$applicationConfig = Spyc::YAMLLoad('config/applications.yaml');
	$coreConfig = Spyc::YAMLLoad('config/core.yaml');
	$appConfig = $applicationConfig[$appName];
	$viewFolder = $appConfig['folder'].'view/';
	$appPrefix = $appConfig['url_prefix'];
	$appFolder = $coreConfig['application_path'];
	
	
	
	
	$layoutCode = 
	'
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- saved from url=(0050)http://passatgt.i-host.hu/tf/gray_admin/index.html -->
<HTML xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><HEAD><META http-equiv="Content-Type" content="text/html; charset=ISO-8859-2">
		
		<META name="keywords" content="">
		<META name="description" content="">
		<TITLE>Admin Template</TITLE>
		<?=$this->css("style")?>
	</HEAD><BODY>
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
								<A href="<?=$this->url("'.$appPrefix.'")?>" class="selected"><SPAN>Home</SPAN></A>
							</LI>
							<LI class="simple">
								<A href="#"><SPAN>Edit Me</SPAN></A>
							</LI>
						</UL>
						<DIV class="clear"></DIV>
					</DIV>

					<DIV id="desc">
						<DIV class="body">
							<DIV id="messages"></DIV>
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
	
</BODY></HTML>';
	
	createEditFile($appFolder.$viewFolder.'layout/layout.php', $layoutCode);
}

