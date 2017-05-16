<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="<?php echo $sitelink; ?>/static/images/favicon.ico">
<title><?php echo $sitename . ' - ' . $pagename ?></title>
<!-- Bootstrap core CSS -->
<link href="<?php echo $sitelink; ?>/static/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome CSS -->
<link href="<?php echo $sitelink; ?>/static/css/font-awesome.min.css" rel="stylesheet">
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
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Home</a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="<?php echo $sitelink; ?>/">Homepage</a></li>
									<li><a href="<?php echo $sitelink; ?>/gallery">Feed</a></li>
								</ul>
							</li>
							<li>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Portofolio</a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="<?php echo $sitelink; ?>/gallery">Gallery</a></li>
									<li><a href="gallery-v3.html">Gallery v3</a></li>
								</ul>
							</li>
							<li>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Contact</a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="<?php echo $sitelink; ?>/contact">Contact Me</a></li>
									<li><a href="about-v2.html">-v2</a></li>
									<li><a href="authors.html">Authors</a></li>
									<li><a href="author-detail.html">Author Detail</a></li>
									<li><a href="archive.html">Archive</a></li>
									<li><a href="contact-v1.html">Contact v1</a></li>
									<li><a href="contact-v2.html">-v2</a></li>
									<li><a href="404.html">Not Found</a></li>
									<li><a href="newsletter.html" target="_blank">Newsletter</a></li>
								</ul>
							</li>
							<li>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">About</a>
                                <ul class="dropdown-menu" role="menu">
									<li><a href="<?php echo $sitelink; ?>/about">About Me</a></li>
									<li><a href="<?php echo $sitelink; ?>/story">My Story</a></li>
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

	<!-- Login Modal -->
	<div class="modal leread-modal fade" id="login-form" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content" id="login-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title"><i class="fa fa-unlock-alt"></i>LaRead Sign In</h4>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Email">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" placeholder="Password">
						</div>
						<div class="linkbox">
							<a href="#">Forgot password ?</a>
							<span>No account ? <a href="#" id="register-btn" data-toggle="modal" data-target="#register-form">Sign Up.</a></span>
							<span class="form-warning"><i class="fa fa-exclamation"></i>Fill the require.</span>
						</div>
						<div class="linkbox">
							<label><input type="checkbox"><span>Remember me</span><i class="fa"></i></label>
							<button type="button" class="btn btn-golden btn-signin">SIGN IN</button>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<div class="provider">
						<span>Sign In With</span>
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
					</div>
				</div>
			</div>
			<div class="modal-content" id="register-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title"><i class="fa fa-lock"></i>LaRead Sign Up</h4>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<input class="form-control" placeholder="Name">
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Username">
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Email">
						</div>
						<div class="form-group">
							<input class="form-control" type="password" placeholder="Password">
						</div>
						<div class="linkbox">
							<span>Already got account? <a href="#" id="login-btn" data-target="#login-form">Sign In.</a></span>
						</div>
						<div class="linkbox">
							<label><input type="checkbox"><span>Remember me</span><i class="fa"></i></label>
							<button type="button" class="btn btn-golden btn-signin">SIGN UP</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script id="twitter-wjs" src="https://platform.twitter.com/widgets.js"></script><script id="facebook-jssdk" src="https://connect.facebook.net/tr_TR/sdk.js#xfbml=1&amp;appId=571763212946322&amp;version=v2.0"></script><script src="<?php echo $sitelink; ?>/static/js/jquery.min.js"></script>
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
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>


<div id="cboxOverlay" style="display: none;"></div><div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;"><div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left;"></div><div id="cboxTopCenter" style="float: left;"></div><div id="cboxTopRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxMiddleLeft" style="float: left;"></div><div id="cboxContent" style="float: left;"><div id="cboxTitle" style="float: left;"></div><div id="cboxCurrent" style="float: left;"></div><button type="button" id="cboxPrevious"></button><button type="button" id="cboxNext"></button><button id="cboxSlideshow"></button><div id="cboxLoadingOverlay" style="float: left;"></div><div id="cboxLoadingGraphic" style="float: left;"></div></div><div id="cboxMiddleRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none; max-width: none;"></div></div><div id="fb-root" class=" fb_reset"><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div><iframe name="fb_xdm_frame_http" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" id="fb_xdm_frame_http" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" src="http://staticxx.facebook.com/connect/xd_arbiter/r/JtmcTFxyLye.js?version=42#channel=fef9dce6ebcec&amp;origin=file%3A%2F%2F" style="border: none;"></iframe><iframe name="fb_xdm_frame_https" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" id="fb_xdm_frame_https" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" src="https://staticxx.facebook.com/connect/xd_arbiter/r/JtmcTFxyLye.js?version=42#channel=fef9dce6ebcec&amp;origin=file%3A%2F%2F" style="border: none;"></iframe></div></div><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div></div></div></div><iframe id="rufous-sandbox" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true" style="position: absolute; visibility: hidden; display: none; width: 0px; height: 0px; padding: 0px; border: none;" title="Twitter analytics iframe"></iframe></body>
</html>
