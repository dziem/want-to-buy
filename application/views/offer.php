<!DOCTYPE html>
<html>
    <head>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/offer.css'); ?>"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>WTB.COM - Buy Anything You Want</title>
	</head>
	
	<body>
		<?php if (!isset($this->session->userdata['logged_in'])) {redirect(base_url());}
		else{$userID = ($this->session->userdata['logged_in']);}?>
		<main>
			<div class="container">
				<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url('assets/img/logo.png'); ?>"></a>
				<div class="head">
					<h1>Give offer</h1>
					<p class="caption">Give your offer and get a chance to sell it</p>
				</div>
				<div class="info">
					<h2><?= $det[0]->name ?></h2>
					<p class="bold">Description</p>
					<p class="caption"><?= $det[0]->description ?></p>
					<p class="bold">Expected price</p>
					<p class="caption">Rp<?= $det[0]->minbudget ?> - Rp<?= $det[0]->maxbudget ?></p>
				</div>
				<form action="<?php echo site_url('main/offer_action') ?>" method="POST">
					<input type="hidden" value="<?= $userID; ?>" name="user_id">
					<input type="hidden" value="<?= $det[0]->transID; ?>" name="trans_id">
					<div class="input-group">
						<div class="label">
							<h3>Describe your offer</h3>
						</div>
						<textarea rows="4" placeholder="Describe here..." name="desc" required></textarea>
					</div>
					<div class="input-group">
						<div class="label">
							<h3>Offer your price</h3>
						</div>
						<input type="number" placeholder="e.g. 100000" name="price" required>
					</div>
					<input type="submit" value="Offer" class="btn btn-yl">
				</form>
			</div>
		</main>
	</body>
</html>