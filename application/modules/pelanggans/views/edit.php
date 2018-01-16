<h3 class="page-title">Edit Pelanggan</h3>
<?= form_open($this->uri->segment(1).'/proses_edit/id/'.$arr); ?>
<?php
foreach ($result as $key => $val) {
	?>
	<div class="row">
	<div class="col-md-6">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Data Pelanggan</h3>
			</div>
			<div class="panel-body">
				<input class="form-control" placeholder="Nama" type="text" name="txt_nama" value="<?= set_value('txt_nama', $val['nama']); ?>">
				<?= form_error('txt_nama'); ?>
				<br>
				<input class="form-control" placeholder="Email" type="text" name="txt_email" value="<?= set_value('txt_email', $val['email']); ?>">
				<?= form_error('txt_email'); ?>
				<br>
				<textarea class="form-control" placeholder="Alamat" rows="3" name="txt_alamat"><?= set_value('txt_alamat', $val['alamat']); ?></textarea>
				<?= form_error('txt_alamat'); ?>
				<br>
				<input class="form-control" placeholder="No Telepon" type="text" name="txt_notelepon" value="<?= set_value('txt_notelepon', $val['no_telepon']); ?>" onkeypress="return blockNonNumbers(this, event, true, false);">
				<?= form_error('txt_notelepon'); ?>
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