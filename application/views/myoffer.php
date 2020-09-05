<!DOCTYPE html>
<html>
    <head>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/myoffer.css'); ?>"/>
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
						<li><a class="active">My Offer</a></li>
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
					<a class="active">My Offer</a>
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
				<h1>My Offers</h1>
				<div class="row">
					<div class="col-20">
						<div class="box">
							<div class="box-row">
								<?php if($status_view == false && $search == false){ ?>
								<p>All (<?= array_sum(array_column($status, 'counts')); ?>)</p>
								<?php }else{ ?>
								<a href="<?php echo site_url('main/myOffer') ?>">All (<?= array_sum(array_column($status, 'counts')); ?>)</a>
								<?php } ?>
							</div>
							<?php foreach($status as $s){ ?>
								<div class="box-row">
									<?php if(($status_view == true)&&($s->status == $status_view)){ ?>
									<p><?= $s->status ?> (<?= $s->counts ?>)</p>
									<?php }else{ ?>
									<a href="<?php echo site_url('main/myOffer').'/'.$s->status ?>"><?= $s->status ?> (<?= $s->counts ?>)</a>
									<?php } ?>
								</div>
							<?php } ?>
						</div>
					</div>
					<div class="col-80">
						<div class="box search">
							<div class="box-row">
								<form>
									<input type="text" name="keyword" placeholder="Search for transaction">
									<input type="submit" name="search" value="Search">
								</form>
							</div>
						</div>
						<div class="box things">
							<?php if(!empty($off)) { ?>
								<div class="box-row head">
									<div class="name">Things</div>
									<div class="status">Status</div>
									<div class="price">Offered Price</div>
								</div>
								<?php foreach($off as $o){ ?>
								<div class="box-row">
									<div class="name">
										<h2><?= $o->name ?></h2>
										<p><?= $o->description ?></p>
									</div>
									<div class="status"><?= $o->status ?></div>
									<div class="price">Rp<?= $o->price ?></div>
								</div>
								<?php } ?>
							<?php }else if(empty($off) && $search == true){?>
								<div class="box-row not-found">
									<h1>Not found</h1>
								</div>
							<?php }else{ ?>
								<div class="box-row not-found">
									<h1>You haven't offer anything</h1>
								</div>
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