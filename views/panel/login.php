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
<div class="modal leread-modal fade-in" id="login-form" tabindex="-1" role="dialog" aria-hidden="true" style="display: block;">
		<div class="modal-dialog">
			<div class="modal-content" id="login-content">
				<div class="modal-header">
					<h4 class="modal-title"><i class="fa fa-unlock-alt"></i><?php echo $sitename; ?> - Sign In</h4>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<input type="email" name="email" class="form-control" placeholder="Email">
						</div>
						<div class="form-group">
							<input type="password" name="password" class="form-control" placeholder="Password">
						</div>
						<div class="linkbox">
							<a href="#">Forgot password ?</a>
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
