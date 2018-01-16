<h3 class="page-title">Edit Size</h3>
<?= form_open($this->uri->segment(1).'/proses_edit/id/'.$arr); ?>
<?php
foreach ($result as $key => $val) {
	?>
	<div class="row">
	<div class="col-md-6">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Data Size</h3>
			</div>
			<div class="panel-body">
				<input class="form-control" placeholder="Size Lengan" type="text" name="txt_sizelengan" value="<?= set_value('txt_sizelengan', $val['value']); ?>">
				<?= form_error('txt_sizelengan'); ?>
				<br>
				<input class="form-control" placeholder="Harga" type="text" name="txt_harga" value="<?= set_value('txt_harga', $val['harga']); ?>" onkeypress="return blockNonNumbers(this, event, true, false);">
				<?= form_error('txt_harga'); ?>
				<br>
				<div style="text-align: right">
					<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i> Submit </button>
				</div>
			</div>
		</div>
	</div>
</div>
	<?php
}
?>
<?= form_close(); ?>