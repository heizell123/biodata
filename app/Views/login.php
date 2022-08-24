<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />
	
	<title>Login</title>
	
	
	<link rel="shortcut icon" href="<?= base_url().'/resto_assets/'?>assets/img/favicon.png">
	<link rel="stylesheet" href="<?= base_url()?>/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="<?= base_url()?>/assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="<?= base_url()?>/assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url()?>/assets/css/neon-core.css">
	<link rel="stylesheet" href="<?= base_url()?>/assets/css/neon-theme.css">
	<link rel="stylesheet" href="<?= base_url()?>/assets/css/neon-forms.css">
	<link rel="stylesheet" href="<?= base_url()?>/assets/css/custom.css">
	<!-- CSS only -->

	<script src="<?= base_url()?>/assets/js/jquery-1.11.0.min.js"></script>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	
</head>
<body class="page-body login-page login-form-fall" data-url="http://neon.dev">


<!-- This is needed when you send requests via Ajax --><script type="text/javascript">
var baseurl = '<?=base_url()?>';
</script>

<div class="login-container">
	
	<div class="login-header login-caret">
		
		<div class="login-content">
			
			<a href="#" class="logo">
			</a>
			
			<p class="description">Dear user, log in to access the admin area!</p>
			
			<!-- progress bar indicator -->
			<div class="login-progressbar-indicator">
				<h3>43%</h3>
				<span>logging in...</span>
			</div>
		</div>
		
	</div>

	
	

	
	<div class="login-form">
		
		<div class="login-content">
			
			<?php if (!empty(session()->getFlashdata('error'))) { ?>
				<div class="form-group"> <div class="alert alert-danger"><strong>Alert!</strong>
					<?php echo session()->getFlashdata('error'); ?></div>
				</div>
				<?php } ?>
			<?php if (!empty(session()->getFlashdata('success'))) { ?>
				<div class="form-group"> <div class="alert alert-success"><strong>Succees!</strong>
						<?php echo session()->getFlashdata('success'); ?></div>
					</div>
				<?php } ?>
			<form method="post" role="form" action="<?= base_url().'/login/action_login'?>">
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-user"></i>
						</div>
						
						<input type="email" class="form-control" name="email" id="email" placeholder="email" autocomplete="off" required />
					</div>
					
				</div>
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-key"></i>
						</div>
						
						<input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" required />
					</div>
				
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block btn-login">
						<i class="entypo-login"></i>
						Login
					</button>
				</div>		
			</form>
			<a href="<?= base_url().'/Login/view_sign_in'?>">
				<div class="form-group">
					<button class="btn btn-info btn-block btn-login">
						<i class="entypo-pencil"></i>
						Sign In
					</button>
				</div>
			</a>
		</div>
		
	</div>
	
</div>


	<!-- Bottom Scripts -->
	<script src="<?= base_url()?>/assets/js/gsap/main-gsap.js"></script>
	<script src="<?= base_url()?>/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="<?= base_url()?>/assets/js/bootstrap.js"></script>
	<script src="<?= base_url()?>/assets/js/joinable.js"></script>
	<script src="<?= base_url()?>/assets/js/resizeable.js"></script>
	<script src="<?= base_url()?>/assets/js/neon-api.js"></script>
	<script src="<?= base_url()?>/assets/js/jquery.validate.min.js"></script>
	<script src="<?= base_url()?>/assets/js/neon-login.js"></script>
	<script src="<?= base_url()?>/assets/js/neon-custom.js"></script>
	<script src="<?= base_url()?>/assets/js/neon-demo.js"></script>

</body>
</html>