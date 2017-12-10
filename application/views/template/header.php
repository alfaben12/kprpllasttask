<script src="<?= base_url() . $this->load->config->item('library'); ?>jquery/jquery-3.2.1.min.js"></script>
<script src="<?= base_url() . $this->load->config->item('library'); ?>jquery/jquery-ui.js"></script>
<script src="<?= base_url() . $this->load->config->item('library'); ?>jquery/jquery.inputmask.bundle.js"></script>
<script src="<?= base_url() . $this->load->config->item('library'); ?>jquery/jquery.blockUI.js"></script>

<script type="text/javascript">
	var javascript_url_module = "<?= config_item('url_javascript'); ?>";
	var ajax_url_module = "<?= config_item('url_ajax'); ?>";
	var url_module = "<?= config_item('url_module'); ?>";
	var base_url = "<?= base_url(); ?>";
</script>
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
<body class="site-material_ext_publish section-material-design noninitial-chapter color-light-blue qp-ui" data-qp-ui="{ 'Mask': {} }">