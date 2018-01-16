<h3 class="page-title">Tambah Baru Pelanggan</h3>
<?= form_open($this->uri->segment(1).'/prosess_tambah'); ?>
<div class="row">
	<div class="col-md-6">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Data Pelanggan</h3>
			</div>
			<div class="panel-body">
				<input class="form-control" placeholder="Nama" type="text" name="txt_nama" value="<?= set_value('txt_nama'); ?>">
				<?= form_error('txt_nama'); ?>
				<br>
				<input class="form-control" placeholder="Email" type="text" name="txt_email" value="<?= set_value('txt_email'); ?>">
				<?= form_error('txt_email'); ?>
				<br>
				<textarea class="form-control" placeholder="Alamat" rows="3" name="txt_alamat"><?= set_value('txt_alamat'); ?></textarea>
				<?= form_error('txt_alamat'); ?>
				<br>
				<input class="form-control" placeholder="No Telepon" type="text" name="txt_notelepon" value="<?= set_value('txt_notelepon'); ?>" onkeypress="return blockNonNumbers(this, event, true, false);">
				<?= form_error('txt_notelepon'); ?>
				<br>
				<div style="text-align: right">
					<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i> Tambah </button>
				</div>
			</div>
		</div>
	</div>
</div>
<?= form_close(); ?>