<!DOCTYPE html>
<html>
    <head>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/post.css'); ?>"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>WTB.COM - Buy Anything You Want</title>
	</head>
	
	<body>
		<?php if (!isset($this->session->userdata['logged_in'])) {redirect(base_url());}
		else{$userID = ($this->session->userdata['logged_in']);}?>
		<main>
			<div class="container">
				<a href="<?php echo base_url(); ?>">
					<img src="<?php echo base_url('assets/img/logo.png'); ?>">
				</a>
				<div class="head">
					<h1>Tell us what you want to buy</h1>
					<p class="caption">Get awesome offer from many sellers. Choose the best offer and pay it</p>
					<p><?php if (isset($message_display)) {echo $message_display;}?></p>
				</div>
				<form action="<?php echo site_url('main/post_action') ?>" method="POST">
					<input type="hidden" value="<?= $userID; ?>" name="user_id">
					<div class="input-group">
						<div class="label">
							<h3>What are you looking for?</h3>
						</div>
						<input type="text" placeholder="e.g. Nike Shoes" name="thing" required>
					</div>
					<div class="input-group">
						<div class="label">
							<h3>What kind of thing is that?</h3>
						</div>
						<select name="category" required>
							<?php if($category == 'fashion'){ ?>
							<option value="" disabled>Category</option>
							<option value="Fashion" selected>Fashion</option>
							<option value="Gadget">Gadget</option>
							<option value="Appliances">Appliances</option>
							<option value="Art">Art</option>
							<option value="Other">Others</option>
							<?php } else if($category == 'gadget') { ?>
							<option value="" disabled>Category</option>
							<option value="Fashion">Fashion</option>
							<option value="Gadget" selected>Gadget</option>
							<option value="Appliances">Appliances</option>
							<option value="Art">Art</option>
							<option value="Other">Others</option>
							<?php } else if($category == 'appliances') { ?>
							<option value="" disabled>Category</option>
							<option value="Fashion">Fashion</option>
							<option value="Gadget">Gadget</option>
							<option value="Appliances" selected>Appliances</option>
							<option value="Art">Art</option>
							<option value="Other">Others</option>
							<?php } else if($category == 'other') { ?>
							<option value="" disabled>Category</option>
							<option value="Fashion">Fashion</option>
							<option value="Gadget">Gadget</option>
							<option value="Appliances">Appliances</option>
							<option value="Art">Art</option>
							<option value="Other" selected>Others</option>
							<?php } else { ?>
							<option value="" disabled selected>Category</option>
							<option value="Fashion">Fashion</option>
							<option value="Gadget">Gadget</option>
							<option value="Appliances">Appliances</option>
							<option value="Art">Art</option>
							<option value="Other">Others</option>
							<?php } ?>
						</select>
					</div>
					<div class="input-group">
						<div class="label">
							<h3>Describe the thing you are looking for</h3>
							<p class="caption">Describe every single details like color, size, etc.</p>
						</div>
						<textarea rows="4" placeholder="Describe here..." name="desc" required></textarea>
					</div>
					<!--<div class="input-group">
						<div class="label">
							<h3>Show us the picture of that thing</h3>
						</div>
						<div class="input-file-container"> 
							<input class="input-file" id="my-file" accept="image/*" type="file">
							<label tabindex="0" for="my-file" class="input-file-trigger">Select a file...</label>
						</div>
						<p class="file-return"></p>
					</div>-->
					<div class="input-group">
						<div class="label">
							<h3>What is your estimated budget?</h3>
						</div>
						<div class="budget-row">
							<div class="budget-col">
								<p>Your minimum estimated budget</p>
								<input type="number" placeholder="Minimum" name="minB" required>
							</div>
							<div class="budget-col">
								<p>Your maximum estimated budget</p>
								<input type="number" placeholder="Maximum" name="maxB" required>
							</div>
						</div>
					</div>
					<input type="submit" value="Find & Buy This Thing" class="btn btn-yl" href="#">
				</form>
			</div>
		</main>
		<!--Javascript
		<script type="text/javascript" src="js/post.js"></script>-->
	</body>
</html>