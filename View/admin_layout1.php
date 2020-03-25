<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		
		<title>Simpla Admin</title>
		
		<!--                       CSS                       -->
	  
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="./resources/css/bootstrap/bootstrap.css">
	<script src="./resources/js/jquery-3.4.1.min.js"></script>
	<script src="./resources/js/bootstrap.js"></script>

		<link rel="stylesheet" href="<?php echo BASE_URL ?>/resources/css/reset.css" type="text/css" media="screen" />
	  
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="<?php echo BASE_URL ?>/resources/css/style.css" type="text/css" media="screen" />
		
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="<?php echo BASE_URL ?>/resources/css/invalid.css" type="text/css" media="screen" />	
		
		<link rel="stylesheet" href="<?php echo BASE_URL ?>/resources/css/my.css" type="text/css" media="screen" />

		<!-- Colour Schemes
	  
		Default colour scheme is green. Uncomment prefered stylesheet to use it.
		
		<link rel="stylesheet" href="<?php echo BASE_URL ?>/resources/css/blue.css" type="text/css" media="screen" />
		
		<link rel="stylesheet" href="<?php echo BASE_URL ?>/resources/css/red.css" type="text/css" media="screen" />  
	 
		-->
		
		<!-- Internet Explorer Fixes Stylesheet -->
		
		<!--[if lte IE 7]>
			<link rel="stylesheet" href="<?php echo BASE_URL ?>/resources/css/ie.css" type="text/css" media="screen" />
		<![endif]-->
		
		<!--                       Javascripts                       -->
  
		<!-- jQuery -->
		<script type="text/javascript" src="<?php echo BASE_URL ?>/resources/scripts/jquery-1.3.2.min.js"></script>
		
		<!-- jQuery Configuration -->
		<script type="text/javascript" src="<?php echo BASE_URL ?>/resources/scripts/simpla.jquery.configuration.js"></script>
		
		<!-- Facebox jQuery Plugin -->
		<script type="text/javascript" src="<?php echo BASE_URL ?>/resources/scripts/facebox.js"></script>
		
		<!-- jQuery WYSIWYG Plugin -->
		<script type="text/javascript" src="<?php echo BASE_URL ?>/resources/scripts/jquery.wysiwyg.js"></script>
		
		<!-- jQuery Datepicker Plugin -->
		<script type="text/javascript" src="<?php echo BASE_URL ?>/resources/scripts/jquery.datePicker.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL ?>/resources/scripts/jquery.date.js"></script>
		<!--[if IE]><script type="text/javascript" src="<?php echo BASE_URL ?>/resources/scripts/jquery.bgiframe.js"></script><![endif]-->

		
		<!-- Internet Explorer .png-fix -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="<?php echo BASE_URL ?>/resources/scripts/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
		
	</head>
  
	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
		<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
			
			<h1 id="sidebar-title"><a href="<?php echo BASE_URL ?>/#">Simpla Admin</a></h1>
		  
			<!-- Logo (221px wide) -->
			<a href="<?php echo BASE_URL ?>/#"><img id="logo" src="<?php echo BASE_URL ?>/resources/images/logo.png" alt="Simpla Admin logo" /></a>
		  
			<!-- Sidebar Profile links -->
			<div id="profile-links">
				Hello, <a href="<?php echo BASE_URL ?>/#" title="Edit your profile">
					<?php echo $_SESSION['admin_login']['ten'] ?>
				</a>, Role: <?php echo $_SESSION['admin_login']['idRole'] ?><br />
				<br />
				<a href="<?php echo BASE_URL ?>/" title="View the Site">View the Site</a> | <a href="<?php echo BASE_URL ?>/index.php?controller=Login&action=logout" title="Sign Out">Sign Out</a>
			</div>        
			
			<ul id="main-nav">  <!-- Accordion Menu -->
				
				<li>
					<a href="<?php echo BASE_URL ?>/admin.php" class="nav-top-item no-submenu"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
						Dashboard
					</a>       
				</li>
				
				<li> 
					<a href="<?php echo BASE_URL ?>/#" class="nav-top-item current"> <!-- Add the class "current" to current menu item -->
					Chuc nang chinh					</a>

							
					<ul>

					<?php 
					if ($_SESSION['admin_login']['idRole']=='1')
					{
					?>
						<li><a href="<?php echo BASE_URL ?>/index.php?controller=Admin&action=hienthi_taochungtumoi">Tao moi chung tu...</a></li>
					<?php 
					} 
					?>

						<li><a href="<?php echo BASE_URL ?>/index.php?controller=Admin&action=hienthi_chungtucanchinhsua">Chung tu can chinh sua</a></li>
						<li><a href="<?php echo BASE_URL ?>/index.php?controller=Admin&action=hienthi_chungtuchuahoanthanh">Chung tu chua hoan thanh</a></li>
					</ul>
				</li>				
			</ul> <!-- End #main-nav -->
			
			<div id="messages" style="display: none"> <!-- Messages are shown when a link with these attributes are clicked: href="<?php echo BASE_URL ?>/#messages" rel="modal"  -->
				
				<h3>3 Messages</h3>
			 
				<p>
					<strong>17th May 2009</strong> by Admin<br />
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
					<small><a href="<?php echo BASE_URL ?>/#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
			 
				<p>
					<strong>2nd May 2009</strong> by Jane Doe<br />
					Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.
					<small><a href="<?php echo BASE_URL ?>/#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
			 
				<p>
					<strong>25th April 2009</strong> by Admin<br />
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
					<small><a href="<?php echo BASE_URL ?>/#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
				
				<form action="#" method="post">
					
					<h4>New Message</h4>
					
					<fieldset>
						<textarea class="textarea" name="textfield" cols="79" rows="5"></textarea>
					</fieldset>
					
					<fieldset>
					
						<select name="dropdown" class="small-input">
							<option value="option1">Send to...</option>
							<option value="option2">Everyone</option>
							<option value="option3">Admin</option>
							<option value="option4">Jane Doe</option>
						</select>
						
						<input class="button" type="submit" value="Send" />
						
					</fieldset>
					
				</form>
				
			</div> <!-- End #messages -->
			
		</div></div> <!-- End #sidebar -->
		
		<div id="main-content"> <!-- Main Content Section with everything -->
			
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="<?php echo BASE_URL ?>/http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="<?php echo BASE_URL ?>/http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					Download From <a href="<?php echo BASE_URL ?>/http://www.exet.tk">exet.tk</a></div>
				</div>
			</noscript>
			
			<!-- Page Head -->
			<h2>Welcome John</h2>
			<p id="page-intro">What would you like to do?</p>
			
			<ul class="shortcut-buttons-set">
				
				<li><a class="shortcut-button" href="<?php echo BASE_URL ?>/#"><span>
					<img src="<?php echo BASE_URL ?>/resources/images/icons/pencil_48.png" alt="icon" /><br />
					Write an Article
				</span></a></li>
				
				<li><a class="shortcut-button" href="<?php echo BASE_URL ?>/#"><span>
					<img src="<?php echo BASE_URL ?>/resources/images/icons/paper_content_pencil_48.png" alt="icon" /><br />
					Create a New Page
				</span></a></li>
				
				<li><a class="shortcut-button" href="<?php echo BASE_URL ?>/#"><span>
					<img src="<?php echo BASE_URL ?>/resources/images/icons/image_add_48.png" alt="icon" /><br />
					Upload an Image
				</span></a></li>
				
				<li><a class="shortcut-button" href="<?php echo BASE_URL ?>/#"><span>
					<img src="<?php echo BASE_URL ?>/resources/images/icons/clock_48.png" alt="icon" /><br />
					Add an Event
				</span></a></li>
				
				<li><a class="shortcut-button" href="<?php echo BASE_URL ?>/#messages" rel="modal"><span>
					<img src="<?php echo BASE_URL ?>/resources/images/icons/comment_48.png" alt="icon" /><br />
					Open Modal
				</span></a></li>
				
			</ul><!-- End .shortcut-buttons-set -->
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box">
				<?php 
				include ROOT."/View/subview/$admin_sub_view";
				?>
			</div> <!-- End .content-box -->
			
			
			<div class="clear"></div>
			
			
			<div id="footer">
				<small> <!-- Remove this notice or replace it with whatever you want -->
						&#169; Copyright 2009 Your Company | Powered by <a href="<?php echo BASE_URL ?>/http://themeforest.net/item/simpla-admin-flexible-user-friendly-admin-skin/46073">Simpla Admin</a> | <a href="<?php echo BASE_URL ?>/admin.php">Top</a>
				</small>
			</div><!-- End #footer -->
			
		</div> <!-- End #main-content -->
		
	</div></body>
  

<!-- Download From www.exet.tk-->
</html>
