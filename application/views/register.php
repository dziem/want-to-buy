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
			<h1>Sign Up</h1>
			<p class="text-center"><?php if (isset($message_display)) {echo $message_display;}?></p>
			<form action="<?php echo site_url('main/register_action') ?>" method="POST">
				<div class="input-group">
					<div class="label">
						<h3>Username</h3>
					</div>
					<input type="text" placeholder="Username" name="username" required>
				</div>
				<div class="input-group">
					<div class="label">
						<h3>Email</h3>
					</div>
					<input type="email" placeholder="Email" name="email" required>
				</div>
				<div class="input-group">
					<div class="label">
						<h3>Password</h3>
					</div>
					<input type="password" placeholder="Password" name="password" required>
				</div>
				<div class="input-group">
					<div class="label">
						<h3>Phone Number</h3>
					</div>
					<input type="text" placeholder="Phone Number" name="phone" required>
				</div>
				<div><a href="<?php echo site_url('main/login') ?>">Already have an account? Login here</a></div>
				<input type="submit" value="Sign Up" class="btn btn-yl">
			</form>
		</main>
	</body>
</html>