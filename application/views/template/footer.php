<div class="clearfix"></div>
<footer>
	<div class="container-fluid">
		<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
	</div>
</footer>

<?php if(isset($includes_for_layout['js']) AND count($includes_for_layout['js']) > 0): ?>
	<?php foreach($includes_for_layout['js'] as $js): ?>

		<?php if($js['script'] == FALSE AND $js['options'] == 'footer'): ?>

			<script type="text/javascript" src="<?php echo $js['file']; ?>"></script>

		<?php endif; ?>
		<?php if($js['script'] == TRUE AND $js['options'] == 'footer'): ?>

			<script type="text/javascript"><?php echo $js['file']; ?></script>

		<?php endif; ?>

	<?php endforeach; ?>
<?php endif; ?>