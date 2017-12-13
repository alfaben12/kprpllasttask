<?php date_default_timezone_set('Asia/Jakarta'); ?> 

<!doctype html>
<html lang="en">

<head>
	<title>Elements | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?= base_url() . config_item('stylesheet') ?>vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() . config_item('stylesheet') ?>vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url() . config_item('stylesheet') ?>vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?= base_url() . config_item('stylesheet') ?>css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?= base_url() . config_item('stylesheet') ?>css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() . config_item('stylesheet') ?>img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?= base_url() . config_item('stylesheet') ?>img/favicon.png">
	<?php $this->load->view('template/header'); ?>
		<div class="main-content">
			<div class="container-fluid">
				<!-- MAIN -->
				<div class="main">
					<?php echo $content_for_layout; ?>
				</div>
				<!-- END MAIN -->
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
	<?php $this->load->view('template/footer'); ?>
	<!-- Javascript -->
	<script src="<?= base_url() . config_item('stylesheet') ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url() . config_item('stylesheet') ?>vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= base_url() . config_item('stylesheet') ?>vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?= base_url() . config_item('stylesheet') ?>scripts/klorofil-common.js"></script>
</body>

</html>
