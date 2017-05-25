<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="<?php echo $sitelink; ?>/static/images/favicon.ico">
<title><?php echo $sitename . ' Admin Panel - ' . $pagename ?></title>
<!-- Bootstrap core CSS -->
<link href="<?php echo $sitelink; ?>/static/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome CSS -->
    <script src="https://use.fontawesome.com/53cc68c3d4.js"></script>
<!-- Jasny CSS -->
<link href="<?php echo $sitelink; ?>/static/css/jasny-bootstrap.min.css" rel="stylesheet">
<!-- Animate CSS -->
<link href="<?php echo $sitelink; ?>/static/css/animate.css" rel="stylesheet">
<!-- Code CSS -->
<link href="<?php echo $sitelink; ?>/static/css/tomorrow-night.css" rel="stylesheet" />
<!-- Gallery CSS -->
<link href="<?php echo $sitelink; ?>/static/css/bootstrap-gallery.css" rel="stylesheet">
<!-- ColorBox CSS -->
<link href="<?php echo $sitelink; ?>/static/css/colorbox.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom font -->
<link href='http://fonts.googleapis.com/css?family=Raleway:400,200,100,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Slab&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<!-- Custom styles for this template -->
<link href="<?php echo $sitelink; ?>/static/css/style.css" rel="stylesheet">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
	<div class="page-loader" style="display: none;">
		<div class="loader-in" style="display: none;">Loading...</div>
		<div class="loader-out" style="display: none;">Loading...</div>
	</div>

	<div class="canvas">
		<div class="canvas-overlay"></div>
		<header>
			<nav class="navbar navbar-fixed-top nav-down navbar-laread">
				<div class="container">
					<div class="navbar-header">
						<a class="navbar-brand" href="<?php echo $sitelink; ?>/"><img height="64" src="<?php echo $sitelink; ?>/static/images/logo-light.png" alt=""></a>
					</div>
					<div class="get-post-titles">
						<button type="button" class="navbar-toggle push-navbar" data-navbar-type="default">
							<i class="fa fa-bars"></i>
						</button>
					</div>
					<a href="#" data-toggle="modal" data-target="#login-form" class="modal-form">
						<i class="fa fa-user"></i>
					</a>
					<button type="button" class="navbar-toggle collapsed menu-collapse" data-toggle="collapse" data-target="#main-nav">
						<span class="sr-only">Toggle navigation</span>
						<i class="fa fa-plus"></i>
					</button>
					<div class="collapse navbar-collapse" id="main-nav">
						<ul class="nav navbar-nav">
							<li>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dashboard</a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="<?php echo $sitelink; ?>/panel/">Homepage</a></li>
									<li><a href="<?php echo $sitelink; ?>/panel/stats">Stats</a></li>
									<li><a href="<?php echo $sitelink; ?>/panel/logout">Log Out</a></li>
								</ul>
							</li>
							<li>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Publications</a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="<?php echo $sitelink; ?>/panel/feed/edit">Manage publications</a></li>
									<li><a href="<?php echo $sitelink; ?>/panel/feed">View Blog Feed</a></li>
								</ul>
							</li>
                            <li>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gallery</a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="<?php echo $sitelink; ?>/panel/gallery/edit">Manage Gallery</a></li>
									<li><a href="<?php echo $sitelink; ?>/panel/gallery">View Gallery</a></li>
								</ul>
							</li>
							<li>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">About</a>
                                <ul class="dropdown-menu" role="menu">
									<li><a href="<?php echo $sitelink; ?>/panel/contacts">How to find me</a></li>
									<li><a href="<?php echo $sitelink; ?>/panel/my-details">My Details</a></li>
								</ul>
							</li>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</nav>
		</header>

		<?php echo $content; ?>

		<footer class="container-fluid footer">
			<div class="container text-center">
				<div class="footer-logo"><img src="<?php echo $sitelink; ?>/static/images/logo-black.png" alt=""></div>
                <p class="laread-motto">Website Designed by Verdi.K for <?php echo $sitename; ?>.</p>
				<div class="laread-social">
					<a href="#" class="fa fa-twitter"></a>
					<a href="#" class="fa fa-facebook"></a>
					<a href="#" class="fa fa-pinterest"></a>
				</div>
			</div>
		</footer>
	</div>

	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script id="twitter-wjs" src="https://platform.twitter.com/widgets.js"></script>
    <script id="facebook-jssdk" src="https://connect.facebook.net/tr_TR/sdk.js#xfbml=1&amp;appId=571763212946322&amp;version=v2.0"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="<?php echo $sitelink; ?>/static/js/bootstrap.min.js"></script>
	<script src="<?php echo $sitelink; ?>/static/js/jasny-bootstrap.min.js"></script>
	<script src="<?php echo $sitelink; ?>/static/js/prettify.js"></script>
	<script src="<?php echo $sitelink; ?>/static/js/lang-css.js"></script>
	<script src="<?php echo $sitelink; ?>/static/js/jquery.blueimp-gallery.min.js"></script>
	<script src="<?php echo $sitelink; ?>/static/js/imagesloaded.js"></script>
	<script src="<?php echo $sitelink; ?>/static/js/masonry.js"></script>
	<script src="<?php echo $sitelink; ?>/static/js/viewportchecker.js"></script>
	<script src="<?php echo $sitelink; ?>/static/js/jquery.dotdotdot.min.js"></script>
	<script src="<?php echo $sitelink; ?>/static/js/jquery.colorbox-min.js"></script>
	<script src="<?php echo $sitelink; ?>/static/js/jquery.nicescroll.min.js"></script>
	<script src="<?php echo $sitelink; ?>/static/js/isotope.pkgd.min.js"></script>
	<script src="<?php echo $sitelink; ?>/static/js/jquery.ellipsis.min.js"></script>
	<script src="<?php echo $sitelink; ?>/static/js/calendar.js"></script>
    <script src="<?php echo $sitelink; ?>/static/js/jquery.touchSwipe.min.js"></script>
	<script src="<?php echo $sitelink; ?>/static/js/script.js"></script>
	<script src="<?php echo $sitelink; ?>/static/js/custom.js"></script>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>


<div id="cboxOverlay" style="display: none;"></div><div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;"><div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left;"></div><div id="cboxTopCenter" style="float: left;"></div><div id="cboxTopRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxMiddleLeft" style="float: left;"></div><div id="cboxContent" style="float: left;"><div id="cboxTitle" style="float: left;"></div><div id="cboxCurrent" style="float: left;"></div><button type="button" id="cboxPrevious"></button><button type="button" id="cboxNext"></button><button id="cboxSlideshow"></button><div id="cboxLoadingOverlay" style="float: left;"></div><div id="cboxLoadingGraphic" style="float: left;"></div></div><div id="cboxMiddleRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none; max-width: none;"></div></div><div id="fb-root" class=" fb_reset"><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div><iframe name="fb_xdm_frame_http" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" id="fb_xdm_frame_http" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" src="http://staticxx.facebook.com/connect/xd_arbiter/r/JtmcTFxyLye.js?version=42#channel=fef9dce6ebcec&amp;origin=file%3A%2F%2F" style="border: none;"></iframe><iframe name="fb_xdm_frame_https" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" id="fb_xdm_frame_https" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" src="https://staticxx.facebook.com/connect/xd_arbiter/r/JtmcTFxyLye.js?version=42#channel=fef9dce6ebcec&amp;origin=file%3A%2F%2F" style="border: none;"></iframe></div></div><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div></div></div></div><iframe id="rufous-sandbox" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true" style="position: absolute; visibility: hidden; display: none; width: 0px; height: 0px; padding: 0px; border: none;" title="Twitter analytics iframe"></iframe></body>
</html>
