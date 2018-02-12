<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Elements | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?= base_url() . config_item('stylesheet') ?>vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() . config_item('stylesheet') ?>vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url() . config_item('stylesheet') ?>vendor/linearicons/style.css">
	<link rel="stylesheet" href="<?= base_url() . config_item('stylesheet') ?>vendor/toastr/toastr.min.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?= base_url() . config_item('stylesheet') ?>css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?= base_url() . config_item('stylesheet') ?>css/demo.css">
	<link rel="stylesheet" href="<?= base_url() . config_item('library') ?>select2/select2.min.css">
	<link rel="stylesheet" href="<?= base_url() . config_item('library') ?>select2/select2.min.css">
	<!-- GOOGLE FONTS -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet"> -->
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() . config_item('stylesheet') ?>img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?= base_url() . config_item('stylesheet') ?>img/favicon.png">
	<script src="<?= base_url() . $this->load->config->item('library'); ?>jquery/jquery-3.2.1.min.js"></script>
	<script src="<?= base_url() . $this->load->config->item('library'); ?>jquery/jquery-ui.js"></script>
	<script src="<?= base_url() . $this->load->config->item('library'); ?>jquery/jquery.inputmask.bundle.js"></script>
	<script src="<?= base_url() . $this->load->config->item('library'); ?>jquery/jquery.blockUI.js"></script>
	<script src="<?= base_url() . $this->load->config->item('library'); ?>blocknonnumber/blocknonnumber.js"></script>
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="<?php echo base_url();?>stylesheet/img/logo-dark.png" alt="Osgraf Logo"></div>
								<p class="lead">Login to your account</p>
							</div>
							<?= $this->session->flashdata('pesan'); ?>
							<?= form_open($this->uri->segment(1).'/prosess_login'); ?>
	
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Email</label>
									<input type="text" name="txt_username" required="" class="form-control" id="signin-email" placeholder="Username">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" name="txt_password" required="" class="form-control" id="signin-password" placeholder="Password">
								</div>

								<button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
								<?= form_close(); ?>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">WELCOME TO OSGRAF APP</h1>
							<p>By SMKN 4 Malang</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
