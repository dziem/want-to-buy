<!DOCTYPE html>
<html>
    <head>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>WTB.COM - Buy Anything You Want</title>
	</head>
	
	<body>
		<!--Navbar-->
		<nav>
			<div class="container">
				<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url('assets/img/logo.png'); ?>"></a>
				<div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
				<ul>
					<li><a href="<?php echo site_url('main/browse') ?>">Browse Things</a></li>
					<div class="mobile">
						<?php 
						if (isset($this->session->userdata['logged_in'])) {
							$userID = ($this->session->userdata['logged_in']);
						?>
						<li><a href="<?php echo site_url('main/myTrans') ?>">My Transaction</a></li>
						<li><a href="<?php echo site_url('main/myOffer') ?>">My Offer</a></li>
						<li><a href="<?php echo site_url('main/logout') ?>">Log Out</a></li>
						<?php } else { ?>
						<li><a href="<?php echo site_url('main/register') ?>">Sign Up</a></li>
						<li><a href="<?php echo site_url('main/login') ?>">Log In</a></li>
						<?php } ?>
						<a class="btn btn-yl" href="<?php echo site_url('main/post') ?>">Buy Something</a>
					</div>
				</ul>
				<div class="right">
					<?php 
					if (isset($this->session->userdata['logged_in'])) {
						$userID = ($this->session->userdata['logged_in']);
					?>
					<a href="<?php echo site_url('main/myTrans') ?>">My Transaction</a>
					<a href="<?php echo site_url('main/myOffer') ?>">My Offer</a>
					<a href="<?php echo site_url('main/logout') ?>">Log Out</a>
					<?php } else { ?>
					<a href="<?php echo site_url('main/register') ?>">Sign Up</a>
					<a href="<?php echo site_url('main/login') ?>">Log In</a>
					<?php } ?>
					<a class="btn btn-yl" href="<?php echo site_url('main/post') ?>">Buy Something</a>
				</div>
			</div>
		</nav>
		<!--End Navbar-->
		<!--Header-->
		<header>
			<div class="container">
				<h1>Find & Buy Anything You Want</h1>
				<p>Buy anything without any effort, the seller will literally come to you</p>
				<div class="btn-ctr">
					<a class="btn btn-yl" href="<?php echo site_url('main/post') ?>">I want to Buy</a>
					<a class="btn btn-o" href="<?php echo site_url('main/browse') ?>">I want to Sell</a>
				</div>
			</div>
		</header>
		<!--End Header-->
		<!--How It Works-->
		<div id="how">
			<div class="container">
				<h1>How It Works</h1>
				<div class="row">
					<div class="col-25">
						<img src="<?php echo base_url('assets/img/describe.png'); ?>">
						<p>Describe what you want and post it</p>
					</div>
					<div class="col-25">
						<img src="<?php echo base_url('assets/img/offer.png'); ?>">
						<p>Wait for the sellers to give you their offer</p>
					</div>
					<div class="col-25">
						<img src="<?php echo base_url('assets/img/choose.png'); ?>">
						<p>Choose only one offer that you like</p>
					</div>
					<div class="col-25">
						<img src="<?php echo base_url('assets/img/pay.png'); ?>">
						<p>Pay and then get the thing that you want</p>
					</div>
				</div>
			</div>
		</div>
		<!--End How It Works-->
		<!--Find Something Now-->
		<div id="find">
			<div class="container">
				<h1>Find Something Now</h1>
				<div class="row">
					<div class="col-25">
						<img src="<?php echo base_url('assets/img/fashion.jpeg'); ?>">
						<a class="ovrly" href="<?php echo site_url('main/post').'/fashion' ?>">
							<p>Fashion</p>
						</a>
					</div>
					<div class="col-25">
						<img src="<?php echo base_url('assets/img/gadget.jpeg'); ?>">
						<a class="ovrly" href="<?php echo site_url('main/post').'/gadget' ?>">
							<p>Gadget</p>
						</a>
					</div>
					<div class="col-25">
						<img src="<?php echo base_url('assets/img/appliances.jpeg'); ?>">
						<a class="ovrly" href="<?php echo site_url('main/post').'/appliances' ?>">
							<p>Appliances</p>
						</a>
					</div>
					<div class="col-25">
						<img src="<?php echo base_url('assets/img/other.jpeg'); ?>">
						<a class="ovrly" href="<?php echo site_url('main/post').'/other' ?>">
							<p>And many more</p>
						</a>
					</div>
				</div>
			</div>
		</div>
		<!--End Find Something Now-->
		<!--Offer Something Now-->
		<div id="offer">
			<div class="container">
				<h1 class="text-center">Offer Your Stuff Now</h1>
				<div class="row">
					<div class="col-25">
						<div>
							<h2>Fashion</h2>
						</div>
						<?php if(empty($fashion)){
							echo "<p>Currently there is no one looking for something in this category</p>";
						}else{
						foreach($fashion as $f){ ?>
						<div>
							<h3><a href="<?php echo site_url('main/detail').'/'.$f->transID ?>"><?= $f->name ?></a></h3>
							<p>Expected Price : </p>
							<p>Rp<?= $f->minbudget ?> - Rp<?= $f->maxbudget ?></p>
						</div>
						<?php }
						}?>
					</div>
					<div class="col-25">
						<div>
							<h2>Gadget</h2>
						</div>
						<?php if(empty($gadget)){
							echo "<p>Currently there is no one looking for something in this category</p>";
						}else{
							foreach($gadget as $g){ ?>
						<div>
							<h3><a href="<?php echo site_url('main/detail').'/'.$g->transID ?>"><?= $g->name ?></a></h3>
							<p>Expected Price : </p>
							<p>Rp<?= $g->minbudget ?> - Rp<?= $g->maxbudget ?></p>
						</div>
						<?php }
						} ?>
					</div>
					<div class="col-25">
						<div>
							<h2>Appliances</h2>
						</div>
						<?php if(empty($appliances)){
							echo "<p>Currently there is no one looking for something in this category</p>";
						}else{
						foreach($appliances as $a){ ?>
						<div>
							<h3><a href="<?php echo site_url('main/detail').'/'.$a->transID ?>"><?= $a->name ?></a></h3>
							<p>Expected Price : </p>
							<p>Rp<?= $a->minbudget ?> - Rp<?= $a->maxbudget ?></p>
						</div>
						<?php } 
						} ?>
					</div>
					<div class="col-25">
						<div>
							<h2>Art</h2>
						</div>
						<?php if(empty($appliances)){
							echo "<p>Currently there is no one looking for something in this category</p>";
						}else{
							foreach($art as $ar){ ?>
						<div>
							<h3><a href="<?php echo site_url('main/detail').'/'.$ar->transID ?>"><?= $ar->name ?></a></h3>
							<p>Expected Price : </p>
							<p>Rp<?= $ar->minbudget ?> - Rp<?= $ar->maxbudget ?></p>
						</div>
						<?php } 
						} ?>
					</div>
				</div>
			</div>
		</div>
		<!--End Offer Something Now-->
		<!--Footer-->
		<footer>
			<div class="container">
				<div class="left"><p>Copyright &copy 2018 wtb.com</p></div>
				<div class="right">
					<a href="#"><span class="fa-stack fa-lg facebook">
						<i class="fa fa-circle fa-stack-2x"></i>
						<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
					</span></a>
					<a href="#"><span class="fa-stack fa-lg instagram">
						<i class="fa fa-circle fa-stack-2x"></i>
						<i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
					</span></a>
					<a href="#"><span class="fa-stack fa-lg pinterest">
						<i class="fa fa-circle fa-stack-2x"></i>
						<i class="fa fa-pinterest fa-stack-1x fa-inverse"></i>
					</span></a>
					<a href="#"><span class="fa-stack fa-lg twitter">
						<i class="fa fa-circle fa-stack-2x"></i>
						<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
					</span></a>
				</div>
			</div>
		</footer>
		<!--End Footer-->
		<!--Javascript-->
		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.2.1.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/script.js'); ?>"></script>
	</body>
</html>