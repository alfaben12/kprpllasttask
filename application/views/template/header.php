<script src="<?= base_url() . $this->load->config->item('library'); ?>jquery/jquery-3.2.1.min.js"></script>
<script src="<?= base_url() . $this->load->config->item('library'); ?>jquery/jquery-ui.js"></script>
<script src="<?= base_url() . $this->load->config->item('library'); ?>jquery/jquery.inputmask.bundle.js"></script>
<script src="<?= base_url() . $this->load->config->item('library'); ?>jquery/jquery.blockUI.js"></script>
<script src="<?= base_url() . $this->load->config->item('library'); ?>blocknonnumber/blocknonnumber.js"></script>

<script type="text/javascript">
	var javascript_url_module = "<?= config_item('url_javascript'); ?>";
	var ajax_url_module = "<?= config_item('url_ajax'); ?>";
	var url_module = "<?= config_item('url_module'); ?>";
	var base_url = "<?= base_url(); ?>";
</script>
<style type="text/css">
	.error{
		color: red;
		font-size: 13px;
	}
</style>
<?php if(isset($includes_for_layout['css']) AND count($includes_for_layout['css']) > 0): ?>
	<?php foreach($includes_for_layout['css'] as $css): ?>
		<?php if($css['script'] == FALSE): ?>
			<link rel="stylesheet" type="text/css" href="<?php echo $css['file']; ?>"<?php echo ($css['options'] === NULL ? '' : ' media="' . $css['options'] . '"'); ?>>
		<?php endif; ?>
		<?php if($css['script'] == TRUE): ?>
			<style type="text/css"><?php echo $css['file']; ?>

		</style>
	<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>
<?php if(isset($includes_for_layout['js']) AND count($includes_for_layout['js']) > 0): ?>
	<?php foreach($includes_for_layout['js'] as $js): ?>
		<?php if($js['script'] == FALSE AND $js['options'] == 'header'): ?>
			<script type="text/javascript" src="<?php echo $js['file']; ?>"></script>
		<?php endif; ?>
		<?php if($js['script'] == TRUE AND $js['options'] == 'header'): ?>
			<script type="text/javascript"><?php echo $js['file']; ?>

		</script>
	<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.html"><img src="<?php echo base_url();?>stylesheet/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<!-- <form class="navbar-form navbar-left">
					<div class="input-group">
						<input type="text" value="" class="form-control" placeholder="Search dashboard...">
						<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
					</div>
				</form> -->
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?= base_url() . config_item('stylesheet') ?>img/user3.png" class="img-circle" alt="Avatar"> <span><?=$this->session->userdata("nama")?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="<?= base_url('logins/keluar'); ?>"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<!-- <li><a href="<?= base_url('penjualans'); ?>" class=""><i class="lnr lnr-chart-bars"></i> <span>Transaksi</span></a></li> -->
						<li><a href="<?= base_url('produks'); ?>" class=""><i class="lnr lnr-home"></i><span>Gudang</span></a></li>
						<li><a href="<?= base_url('produksis'); ?>" class=""><i class="lnr lnr-dice"></i> <span>Produksi</span></a></li>
						<li><a href="<?= base_url('load_view/kasir'); ?>" class=""><i class="lnr lnr-text-format"></i> <span>Kasir</span></a></li>
						
						<!-- <li><a href="notifications.html" class=""><i class="lnr lnr-alarm"></i> <span>Notifications</span></a></li>
						-->
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-chart-bars"></i> <span>Transaksi</span> <i class="icon-submenu lnr lnr-chevron-right"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="<?= base_url('penjualans'); ?>" class="">Penjualan</a></li>
									<li><a href="<?= base_url('pembelians'); ?>" class="">Pembelian	</a></li>
									<!-- <li><a href="page-lockscreen.html" class="">Lockscreen</a></li> -->
								</ul>
							</div>
						</li>
						<li><a href="<?= base_url('load_view/report'); ?>" class=""><i class="lnr lnr-linearicons"></i> <span>Report</span></a></li>
						<!--<li><a href="typography.html" class=""><i class="lnr lnr-text-format"></i> <span>Typography</span></a></li>
						<li><a href="icons.html" class=""><i class="lnr lnr-linearicons"></i> <span>Icons</span></a></li> -->
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
