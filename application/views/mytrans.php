<!DOCTYPE html>
<html>
    <head>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/mytrans.css'); ?>"/>
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
						<li><a class="active">My Transaction</a></li>
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
					<a class="active">My Transaction</a>
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
				<h1>My Transactions</h1>
				<div class="row">
					<div class="col-20">
						<div class="box">
							<div class="box-row">
								<?php if($status_view == false && $search == false){ ?>
								<p>All (<?= array_sum(array_column($status, 'counts')); ?>)</p>
								<?php }else{ ?>
								<a href="<?php echo site_url('main/myTrans') ?>">All (<?= array_sum(array_column($status, 'counts')); ?>)</a>
								<?php } ?>
							</div>
							<?php foreach($status as $s){ ?>
								<div class="box-row">
									<?php if(($status_view == true)&&($s->status == $status_view)){ ?>
									<p><?= $s->status ?> (<?= $s->counts ?>)</p>
									<?php }else{ ?>
									<a href="<?php echo site_url('main/myTrans').'/'.$s->status ?>"><?= $s->status ?> (<?= $s->counts ?>)</a>
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
							<?php if(!empty($trans)) { ?>
								<div class="box-row head">
									<div class="name">Things</div>
									<div class="offer">Offers</div>
									<div class="status">Status</div>
									<div class="price">Average / Accepted Price</div>
								</div>
								<?php foreach($trans as $t){ ?>
								<div class="box-row">
									<div class="name">
										<h2><?= $t->name ?> <small>(<?= ucfirst($t->category) ?>)</small></h2>
										<p><p><?= substr($t->description, 0, 150);
										if(strlen($t->description)>150){echo "...";}?></p></p>
									</div>
									<div class="offer"><?= $t->offers ?></div>
									<div class="status"><?= $t->status ?></div>
									<div class="price">
										<?php
										if($t->offers > 0){echo round($t->average)."<small> (average)</small>";}
										else{echo "-";}
										?>
									</div>
									<a href="<?php echo site_url('main/myTransDet').'/'.$t->tID ?>"></a>
								</div>
								<?php } ?>
							<?php }else if(empty($trans) && $search == true){?>
								<div class="box-row not-found">
									<h1>Not found</h1>
								</div>
							<?php }else{ ?>
								<div class="box-row not-found">
									<h1>You haven't buy/find anything</h1>
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