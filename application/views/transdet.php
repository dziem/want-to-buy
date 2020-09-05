<!DOCTYPE html>
<html>
    <head>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/trans-det.css'); ?>"/>
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
						<li><a href="<?php echo site_url('main/myTrans') ?>" class="active">My Transaction</a></li>
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
					<a href="<?php echo site_url('main/myTrans') ?>" class="active">My Transaction</a>
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
		<!--Main-->
		<main>
			<div class="container">
				<div class="row">
					<div class="col-100">
						<div class="box">
							<div class="box-row">
								<h1><?= $det[0]->name ?></h1>
								<h2>Description</h2>
								<p><?= $det[0]->description ?></p>
							</div>
						</div>
						<?php if(!empty($off_taken)){ ?>
						<div class="box" style="margin-top: 15px;">
							<div class="box-row">
								<h2>You choose <?= $off_taken[0]->username ?>'s offer priced  <?= $off_taken[0]->price ?></h2>
								<p>But we don't have the feature for payment and so on, we are currently working on it</p>
								<p>For now you have to finish it by yourself, here is <?= $off_taken[0]->username ?>'s contact</p>
								<p>Phone : <?= $off_taken[0]->phoneNumber ?></p>
								<p>Email : <?= $off_taken[0]->email ?></p>
							</div>
						</div>
						<?php }?>
						<div class="box pricing">
							<div class="box-row">
								<div>
									<p>Offers</p>
									<h2><?= sizeof($off) ?></h2>
								</div>
								<div>
									<p>Average Price Offered</p>
									<?php if(empty($avg)){ ?>
									<h2>-</h2>
									<?php }else{?>
									<h2>Rp<?= round($avg[0]->avg) ?></h2>
									<?php } ?>
								</div>
								<div>
									<p>Expected Price</p>
									<h2>Rp<?= $det[0]->minbudget ?> - Rp<?= $det[0]->maxbudget ?></h2>
								</div>
							</div>
						</div>
						<div class="box offers">
							<?php if(empty($off)){ ?>
								<div class="box-row">
									<h2 style="margin: 0;">No offer yet</h2>
								</div>
							<?php }else{?>
								<?php foreach($off as $o){ ?>
								<div class="box-row">
									<div class="det">
										<h2><?= $o->username ?></h2>
										<p>Price Offered : Rp<?= $o->price ?></p>
										<p class="desc">Description : <br> <?= $o->description ?></p>
										<?php if($det[0]->status != 'Done'){ ?>
										<a class="btn btn-yl" href="<?= site_url('main/take/'.$o->offerID.'/'.$o->transID) ?>">Take This Offer</a>
										<?php } ?>
									</div>
								</div>
								<?php } ?>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</main>
		<!--End Main-->
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