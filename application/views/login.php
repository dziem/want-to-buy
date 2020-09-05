<!DOCTYPE html>
<html>
    <head>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/log-sign.css'); ?>"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>WTB.COM - Buy Anything You Want</title>
	</head>
	
	<body>
		<main>
			<div class="text-center logo">
				<a href="<?php echo base_url(); ?>">
					<img src="<?php echo base_url('assets/img/logo.png'); ?>">
				</a>
			</div>
			<h1>Login</h1>
			<p class="text-center"><?php if (isset($message_display)) {echo $message_display;}?></p>
			<form action="<?php echo site_url('main/login_action') ?>" method="POST">
				<div class="input-group">
					<div class="label">
						<h3>Username</h3>
					</div>
					<input type="text" placeholder="Username" name="username" required>
				</div>
				<div class="input-group">
					<div class="label">
						<h3>Password</h3>
					</div>
					<input type="password" placeholder="Password" name="password" required>
				</div>
				<div><a href="<?php echo site_url('main/register') ?>">Don't have an account? Sign up here</a></div>
				<input type="submit" value="Log In" class="btn btn-yl" href="#">
			</form>
		</main>
	</body>
</html>